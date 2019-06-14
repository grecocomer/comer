<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\catservicios;
use App\servicios;
use App\empleados;
use App\detalle_vs;
use App\users;
use App\ventass;
use Carbon\Carbon;

class moservicio extends Controller
{
    public function venta_s(){
       // return view('modulos.servicio.moservicio');
        
        $clavequesigue = ventass::orderBy('id_vs','desc')
        ->take(1)->get();
        $cuantos = count($clavequesigue);
        if($cuantos==0)
        {
        $id_vs= 1;
        }
        else
        {
        $id_vs = $clavequesigue[0]->id_vs+1;   
        }
        $id_emp = empleados::all();
        $fecha_venta=carbon::now();
        //$fecha_venta=$fecha_venta->format('d-m-Y');
        $catservicios = catservicios::all();
        return view('modulos.servicio.moservicio')
        ->with('catservicios',$catservicios)
        ->with('id_vs',$id_vs)
        ->with('id_emp',$id_emp)
        //->with('fecha_venta',$fecha_venta);
        ->with('fecha_venta',$fecha_venta->toDateString());
        //->with('fecha_venta',$fecha_venta->format('y-m-d'));
        
            }  

            function comboser(Request $request)
       {
            $id_cat_ser = $request->get('id_cat_ser');
            $servicios = servicios::where('id_cat_ser','=',$id_cat_ser)->get();
             return view ('modulos.servicio.coms')->with('servicios',$servicios);
       }

       function detalles(Request $request)
       {
           // todo esto sirve para mostrar los detalles del producto pero en marca solo muestra el id
          $id_ser = $request->get('id_ser');
          //  $nom_marca = $request->get('nom_marca');
           // $servicios = servicios::where('id_ser','=',$id_ser)->get();
          //  $marcaservicios = marcaservicios::where('nom_marca','=',$nom_marca)->get();
         //  return view ('modulos.producto.detallepro')->with('servicios',$servicios[0]);
           // ->with('nom_marca',$nom_marca);

           // todo esto sirve para mostrar los detalles del producto pero en marca muestra el nombre

      $servicios=\DB::select("     SELECT  
      s.id_ser,
        s.nombre_ser,
        s.descripcion_ser,
        s.costo
          FROM servicios AS s 
           WHERE s.id_ser = ".$id_ser); 
       
     return view ('modulos.servicio.detalleser')->with('servicios',$servicios[0]);
       
       }

       function carritos(Request $request)
       {
     
           $ventass = ventass::where('id_vs',$request->id_vs)->get();
          
       $cuantos = count($ventass);
     
           if($cuantos==0)
           {   
             
               $ventass = new ventass;
               $ventass->id_vs = $request->id_vs;
               $ventass->id_user = $request->id;
               $ventass->fecha_venta_ser =$request->fecha_venta;
               $ventass->total_vs =$request->total;
               $ventass->save();
               
               $detalle_vs = new detalle_vs;
               $detalle_vs->id_vs = $request->id_vs;
               $detalle_vs->id_ser = $request->id_ser;
               $detalle_vs->id_emp = $request->id_emp;
               $detalle_vs->cantidad = $request->cantidad;
               $detalle_vs->costo = $request->costo;
               $detalle_vs->fecha_venta = $request->fecha_venta;
               //$detalle_vs->costo = $request->subt / $request->cantidad;
               $detalle_vs->save();
              
           }
           else
           {
            $detalle_vs = new detalle_vs;
            $detalle_vs->id_vs = $request->id_vs;
            $detalle_vs->id_ser = $request->id_ser;
            $detalle_vs->id_emp = $request->id_emp;
            $detalle_vs->cantidad = $request->cantidad;
            $detalle_vs->costo = $request->costo;
            $detalle_vs->fecha_venta = $request->fecha_venta;
            //$detalle_vs->costo = $request->subt / $request->cantidad;
            $detalle_vs->save();
           }
           $resultado=\DB::select("SELECT vs.id_dvs,
           vs.id_ser, 
           vs.id_emp,
           vs.cantidad,
           vs.costo,
           s.nombre_ser
                      FROM detalle_vs AS vs
                      INNER JOIN servicios AS s ON s.id_ser = vs.id_ser
           WHERE vs.id_vs= ?",[$request->id_vs]);
           
          $resultado2=\DB::select("SELECT total_vs AS total
                                   FROM ventass WHERE id_vs = ?",[$request->id_vs]);
       
          return view ('modulos.servicio.listas')
          ->with('resultado',$resultado)
          ->with('resultado2',$resultado2[0]);
       }
   
       public function borraventass(Request $request)
    {
         $ventass = detalle_vs::where('id_dvs',$request->id_dvs)->get();
         $id_vs = $ventass[0]->id_vs;
         detalle_vs::find($request->id_dvs)->delete();
         ////////////////////////////
     //echo "borraventass con clave $request->id_dvs con venta $id_vs ";
     $resultado=\DB::select("SELECT vs.id_dvs,
     vs.id_ser, 
     vs.id_emp,
     vs.cantidad,
     vs.costo,
     s.nombre_ser
                FROM detalle_vs AS vs
                INNER JOIN servicios AS s ON s.id_ser = vs.id_ser
     WHERE vs.id_vs = ?",[$id_vs]);
        
 $resultado2=\DB::select("SELECT total_vs AS total
 FROM vestass WHERE id_vs = ?",[$id_vs]);

    
       return view ('modulos.servicio.listas')
       ->with('resultado',$resultado)
     ->with('resultado2',$resultado2[0]);
    }
    
}
