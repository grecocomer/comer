<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
// nombre de las tablas de la base de datos
use App\productos;
use App\marcaproductos;
use App\catproductos;
use Session; 

class conproducto extends Controller
{
    // productos

     //INICIO
     public function confirmacion()
     {
             if( Session::get('sesionidu')!="")
      {
                 return view ('cliente.mensaje1');
               }
               else
               {
                 Session::flash('error', 'El usuario esta desactivado, favor de consultar a su administrador');
               return redirect()->route('login');
               }
}

public function home()
{ 
return view ('index');
}


public function altaproducto()
{
  if(Session::get('sesionidu')!="")
		{
    //el controlador manda a llamar a la vista alta producto de la carpeta producto
      // selecciona los datos que contenga la tabla sexo y solo muestra los datos que se encuentren activos "SI"
  // select * from sexo
  // return view('welcome');
  // aqui esta el error
  // sirve para hacer que el cuadro de texto  siempre tenga el id lleno, siempre y cuando tengas tegristros
  // en la base de datos.
  $clavequesigue = productos::withTrashed()->orderBy('id_prod','desc')
  ->take(1)
  ->get();
  

   
   if (count($clavequesigue)==0)
   {
   $idp = 1;
   }
   else
   {
   $idp= $clavequesigue[0]->id_prod+1;
   }

   //muestra el combo con los datos activos en la base de datos.
  $marcaproductos = marcaproductos::where('activo','si')
->orderBy('nom_marca','asc')
->get();

$catproductos = catproductos::where('activo','si')
->orderBy('nom_categoria','asc')
->get();
// DESPUES DE QUE VERIFICA TODOS LOS DATOS MANDA A LLAMAR A LA VISTA
//return $sexo;
return view ('producto.altaproducto')
->with('marcaproductos', $marcaproductos)
->with('catproductos', $catproductos)
->with('idp',$idp);
                                    }
                                    else
                                    {
                                      Session::flash('error', 'El usuario esta desactivado, favor de consultar a su administrador');
                                     return redirect()->route('login');
                                    }
   }

   public function guardaproducto(Request $request)
    {
     
        
      //validaciones del formulario

      $this->validate($request,[
        'id_prod'=>'required|numeric',
        'nombre_prod'=>'required|regex:/^[\pL\s\-]+$/u',
        'archivo' => 'image|mimes:jpg,jpeg,gif,png',
        'descripcion_prod'=>'required|regex:/^[\pL\s\-]+$/u',
        'costo'=>'required|numeric',
      ]);   
      
        //$file => c:/>user/images/  ruta de la imagen
        $file = $request->file('Archivo');
        if($file!=""){
        //ldate  => 20180928_063455_
        $ldate = date('Ymd_His_');
        //$img = normita-jpg
        $img = $file->getClientOriginalName();
        // img
        $img2 = $ldate.$img;
        //imagen predefinida para el cliente
        \Storage::disk('local')->put($img2, \File::get($file));
        }
  
      else{
        $img2 = 'sinfoto.jpg';
      }

      // insertar datos
      $prod = new productos;
      $prod->id_prod = $request->id_prod;
      $prod->nombre_prod = $request->nombre_prod;
      //campo archivo de la base de datos
      $prod->archivo = $img2;
      $prod->descripcion_prod = $request->descripcion_prod;
      $prod->Existencia = $request->Existencia;
      $prod->tipo = $request->tipo;
      $prod->costo = $request->costo;
      $prod->u_m = $request->u_m;
      $prod->contenido = $request->contenido;
      $prod->id_marca = $request ->id_marca;
      $prod->id_cat_producto = $request->id_cat_producto;
      $prod->save();

      return redirect()->route('confirmacion');
    }

    // reporte producto
public function reporteproducto()
{
  if(Session::get('sesionidu')!="")
		{

    //consulta para hacer uns multiconsulta de varias tablas                       
 
    $productos=\DB::select("SELECT p.id_prod, p.nombre_prod, p.archivo, p.descripcion_prod, p.Existencia,p.tipo,
                          p.costo,p.u_m, p.contenido,m.nom_marca AS nomarc,c.nom_categoria AS nomcat,p.deleted_at
                      FROM productos AS p 
                      INNER JOIN catproductos AS c ON p.id_cat_producto = c.id_cat_producto
                      INNER JOIN marcaproductos AS m ON p.id_marca = m.id_marca
                      ORDER BY p.`id_prod`"); 

    return view ('producto.reporteprod')
    ->with('productos',$productos);

    //$productos = productos::withTrashed()// solo desactiva el registro
    
  //$productos = productos::orderBy('nombre_prod','asc')->get();
  // rutas para mandar a llamar la vista 1.-carpeta 2.-nombre de la vista
 // return view ('producto.reporteprod')->with('productos',$productos);
}
else
{
  Session::flash('error', 'El usuario esta desactivado, favor de consultar a su administrador');
 return redirect()->route('login');
}
}



      public function modificaproductos($id_prod)
      {
        if(Session::get('sesionidu')!="")
		{
      //  echo "Maestro modificado $idm";
      
      $productos = productos::where('id_prod','=',$id_prod)->get();

      $id_prod = $productos[0]->id_prod;

      $produ = productos::where('id_prod','=',$id_prod)->get();

      $prod = productos::where('id_prod','=',$id_prod)->get();

      $id_marca=$productos[0]->id_marca;

      $marca = marcaproductos::where('id_marca','=',$id_marca)->get();

      $marcaproductos = marcaproductos::where('id_marca','!=',$id_marca)->get();

      $id_cat_producto=$productos[0]->id_cat_producto;

      $categoria = catproductos::where('id_cat_producto','=',$id_cat_producto)->get();

      $catproductos = catproductos::where('id_cat_producto','!=',$id_cat_producto)->get();

      return view('producto.modificaproducto')
      // el cero es para que todos los datos de la consulta aparezcan
      ->with('productos',$productos[0])
      ->with('id_prod',$id_prod)
      ->with('produ',$produ[0]->Existencia)
     

      ->with('id_marca',$id_marca)
      ->with('marca',$marca[0]->nom_marca)
      ->with('marcaproductos',$marcaproductos)

      ->with('id_cat_producto',$id_cat_producto)
      ->with('categoria',$categoria[0]->nom_categoria)
      ->with('catproductos',$catproductos);
    }
    else
    {
      Session::flash('error', 'El usuario esta desactivado, favor de consultar a su administrador');
     return redirect()->route('login');
    }

      }
      public function guardaedicionp(Request $request)
      {
        if(Session::get('sesionidu')!="")
		{
      
        $id_prod = $request->id_prod;
        $nombre_prod = $request->nombre_prod;
        $descripcion_prod = $request->descripcion_prod;
        $Existencia = $request->Existencia;
        $costo = $request->costo;
        $u_m = $request->u_m;
        $contenido = $request->contenido;
        $id_marca = $request->id_marca;
        $id_cat_producto = $request->id_cat_producto;

        //validaciones del formulario
  
        $this->validate($request,[
          'id_prod'=>'required|numeric',
          'nombre_prod'=>'required|regex:/^[\pL\s\-]+$/u',
          'archivo' => 'image|mimes:jpg,jpeg,gif,png',
          'descripcion_prod'=>'required|regex:/^[\pL\s\-]+$/u',
          'costo'=>'required|numeric',
         
        ]);   
        
          //$file => c:/>user/images/  ruta de la imagen
          $file = $request->file('Archivo');
          if($file!=""){
          //ldate  => 20180928_063455_
          $ldate = date('Ymd_His_');
          //$img = normita-jpg
          $img = $file->getClientOriginalName();
          // img
          $img2 = $ldate.$img;
          //imagen predefinida para el cliente
          \Storage::disk('local')->put($img2, \File::get($file));
          }

          $prod = productos::find($id_prod);
          if ($file!="")
          {
            $prod->archivo=$img2;
          }
  
        // 
      
        $prod->id_prod = $request->id_prod;
        $prod->nombre_prod = $request->nombre_prod;
        $prod->descripcion_prod = $request->descripcion_prod;
        $prod->Existencia = $request->Existencia;
        $prod->costo = $request->costo;
        $prod->u_m = $request->u_m;
        $prod->contenido = $request->contenido;
        $prod->id_marca = $request->id_marca;
        $prod->id_cat_producto = $request->id_cat_producto;
        $prod->save();
  
        return redirect()->route('confirmacion');
      }
      else
      {
        Session::flash('error', 'El usuario esta desactivado, favor de consultar a su administrador');
       return redirect()->route('login');
      }
  
      }
  
      // desactivar registros
      //en esta funcion no cargan los estilos todo lo demas funciona bien
      public function eliminaproducto($id_prod)
      {
        if(Session::get('sesionidu')!="")
		{
        //echo "El maestro a eliminar es $id_prod";
        productos::find($id_prod)->delete();

        return redirect()->route('confirmacion');
    }
    else
    {
      Session::flash('error', 'El usuario esta desactivado, favor de consultar a su administrador');
     return redirect()->route('login');
    }

      }

      //en esta funcion no cargan los estilos todo lo demas funciona bien
      public function restaurarproducto($id_prod)
      {
        if(Session::get('sesionidu')!="")
		{
       
        productos::withTrashed()->where('id_prod',$id_prod)->restore();
       // find($idm)->delete();
       return redirect()->route('confirmacion');
      }
      else
      {
        Session::flash('error', 'El usuario esta desactivado, favor de consultar a su administrador');
       return redirect()->route('login');
      }
      }



}
