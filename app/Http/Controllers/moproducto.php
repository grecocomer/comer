<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\catproductos;
use App\productos;
use App\marcaproductos;
use App\detalle_vp;
use App\ventasp;
use App\users;
use Carbon\Carbon;

class moproducto extends Controller
{
    public function venta(){
//return view('modulos.producto.moproducto');

$clavequesigue = ventasp::orderBy('id_vp','desc')
->take(1)->get();
$cuantos = count($clavequesigue);
if($cuantos==0)
{
$id_vp= 1;
}
else
{
$id_vp = $clavequesigue[0]->id_vp+1;   
}

$fecha_venta=carbon::now();
//$fecha_venta=$fecha_venta->format('d-m-Y');
$catproductos = catproductos::all();
return view('modulos.producto.moproducto')
->with('catproductos',$catproductos)
->with('id_vp',$id_vp)
//->with('fecha_venta',$fecha_venta);
->with('fecha_venta',$fecha_venta->toDateString());
//->with('fecha_venta',$fecha_venta->format('y-m-d'));

    }

    function combopro(Request $request)
       {
            $id_cat_producto = $request->get('id_cat_producto');
            $productos = productos::where('id_cat_producto','=',$id_cat_producto)->get();
             return view ('modulos.producto.comp')->with('productos',$productos);
       }

       function detallep(Request $request)
       {
           // todo esto sirve para mostrar los detalles del producto pero en marca solo muestra el id
          $id_prod = $request->get('id_prod');
          //  $nom_marca = $request->get('nom_marca');
           // $productos = productos::where('id_prod','=',$id_prod)->get();
          //  $marcaproductos = marcaproductos::where('nom_marca','=',$nom_marca)->get();
         //  return view ('modulos.producto.detallepro')->with('productos',$productos[0]);
           // ->with('nom_marca',$nom_marca);

           // todo esto sirve para mostrar los detalles del producto pero en marca muestra el nombre

      $productos=\DB::select(" SELECT  
         p.id_prod,
         p.archivo, 
         p.descripcion_prod, 
         p.Existencia, 
           p.costo,
         m.nom_marca AS nomarc
           FROM productos AS p 
         INNER JOIN marcaproductos AS m ON p.id_marca = m.id_marca
         WHERE p.id_prod = ".$id_prod); 
       
     return view ('modulos.producto.detallepro')->with('productos',$productos[0]);
       
       }

       function carrito(Request $request)
    {
	
        $ventasp = ventasp::where('id_vp',$request->id_vp)->get();
       
		$cuantos = count($ventasp);
	
        if($cuantos==0)
        {   
          
            $ventasp = new ventasp;
			$ventasp->id_vp = $request->id_vp;
			$ventasp->id_user = $request->id;
            $ventasp->fecha_venta =$request->fecha_venta;
			$ventasp->total_vp =$request->total;
			$ventasp->save();
            
            $detalle_vp = new detalle_vp;
            $detalle_vp->id_vp = $request->id_vp;
            $detalle_vp->id_prod = $request->id_prod;
            $detalle_vp->cantidad = $request->cantidad;
            $detalle_vp->fecha_venta = $request->fecha_venta;
            $detalle_vp->costo = $request->costo;
            //$detalle_vp->costo = $request->subt / $request->cantidad;
            $detalle_vp->save();
           
        }
        else
        {
            $detalle_vp = new detalle_vp;
            $detalle_vp->id_vp = $request->id_vp;
            $detalle_vp->id_prod = $request->id_prod;
            $detalle_vp->cantidad = $request->cantidad;
            $detalle_vp->fecha_venta = $request->fecha_venta;
            $detalle_vp->costo = $request->costo;
            //$detalle_vp->costo = $request->subt / $request->cantidad;
            $detalle_vp->save();
        }
        $resultado=\DB::select("SELECT vd.id_dvp,
        vd.id_prod,
        vd.cantidad,
        vd.costo,
        vd.cantidad ,
        p.nombre_prod,
        p.Archivo
        FROM detalle_vp AS vd
        INNER JOIN productos AS p ON p.id_prod = vd.id_prod
        WHERE vd.id_vp= ?",[$request->id_vp]);
        
       $resultado2=\DB::select("SELECT SUM(cantidad*costo) AS total
       FROM detalle_vp
       WHERE id_vp = ?",[$request->id_vp]);
    
       return view ('modulos.producto.listap')
       ->with('resultado',$resultado)
       ->with('resultado2',$resultado2[0]);
    }

    public function borraventas(Request $request)
    {
        $ventasp = detalle_vp::where('id_dvp',$request->id_dvp)->get();
     $id_vp = $ventasp[0]->id_vp;
         detalle_vp::find($request->id_dvp)->delete();
         ////////////////////////////
     //echo "borraventasp con clave $request->id_dvp con venta $id_vp ";
     $resultado=\DB::select("SELECT vd.id_dvp, vd.id_prod ,vd.cantidad, vd.costo, p.nombre_prod,
     p.Archivo
     FROM detalle_vp AS vd
     INNER JOIN productos AS p ON p.id_prod = vd.id_prod
     WHERE vd.id_vp= ?",[$id_vp]);
        
        
 $resultado2=\DB::select("SELECT total_vp AS total
 FROM ventasp WHERE id_vp = ?",[$id_vp]);
    
       return view ('modulos.producto.listap')
       ->with('resultado',$resultado)
     ->with('resultado2',$resultado2[0]);
    }
    
}
