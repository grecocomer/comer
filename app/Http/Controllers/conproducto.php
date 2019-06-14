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
  $clavequesigue = productos::orderBy('id_prod','desc')
  ->take(1)
  ->get();
   $idp = $clavequesigue[0]->id_prod+1;

   //muestra el combo con los datos activos en la base de datos.
  $marcaproductos = marcaproductos::where('activo','si')
->orderBy('nom_marca','asc')
->get();

$catproductos = catproductos::where('activo','si')
->orderBy('nom_categoria','asc')
->get();
// DESPUES DE QUE VERIFICA TODOS LOS DATOS MANDA A LLAMAR A LA VISTA
//return $sexo;
return view ('producto.altaproducto')->with('marcaproductos', $marcaproductos)
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
        'Existencia'=>'required|regex:/^[\pL\s\-]+$/u',
        'costo'=>'required|numeric',
        'u_m'=>'required|regex:/^[\pL\s\-]+$/u',
        'contenido'=>'required|regex:/^[\pL\s\-]+$/u'
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
    //  $cli -> archivo =$img2;
      $prod -> id_prod = $request->id_prod;
      $prod -> nombre_prod = $request->nombre_prod;
      //campo archivo de la base de datos
      $prod -> archivo = $img2;
      $prod -> descripcion_prod = $request->descripcion_prod;
      $prod-> Existencia = $request->Existencia;
      $prod -> costo = $request->costo;
      $prod-> u_m = $request->u_m;
      $prod->  contenido = $request->contenido;
      $prod-> id_marca = $request -> id_marca;
      $prod-> id_cat_producto = $request -> id_cat_producto;
      $prod-> save();

      $titulo = "ALTA DE PRODUCTO";
      $mensaje1 = "El Producto fue guardado correctamente";
      return view ("cliente.mensaje1")
      ->with('titulo', $titulo)
      ->with('mensaje1', $mensaje1);
    }

    // reporte producto
public function reporteproducto()
{
  if(Session::get('sesionidu')!="")
		{

    //consulta para hacer uns multiconsulta de varias tablas                       
 
    $res=\DB::select("SELECT p.id_prod, 
    p.nombre_prod, 
    p.archivo, 
    p.descripcion_prod, 
    p.Existencia, 
    p.costo,
    p.u_m, 
    p.contenido,
    m.nom_marca AS nomarc,
    c.nom_categoria AS nomcat,
    p.deleted_at
    FROM productos AS p 
    INNER JOIN catproductos AS c ON p.id_cat_producto = c.id_cat_producto
    INNER JOIN marcaproductos AS m ON p.id_marca = m.id_marca"); 

    return view ('producto.reporteprod')->with('productos',$res);

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

      $pro = productos::where('id_prod','=',$id_prod)->get();

      $id_marca=$pro[0]->id_marca;
      $id_cat_producto=$pro[0]->id_cat_producto;
      
      $marca = marcaproductos::where('id_marca','=',$id_marca)->get();
      $marcaproductos = marcaproductos::where('id_marca','!=',$id_marca)->get();

      $categoria = catproductos::where('id_cat_producto','=',$id_cat_producto)->get();
      $catproductos = catproductos::where('id_cat_producto','!=',$id_cat_producto)->get();

      return view('producto.modificaproducto')
      // el cero es para que todos los datos de la consulta aparezcan
      ->with('productos',$pro[0])

      ->with('id_marca',$id_marca)
      ->with('marca',$marca[0]->nombre_prod)
      ->with('marcaproductos',$marcaproductos)

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
        $cp = $request->cp;
        $id_marca = $request->id_marca;
        $id_cat_producto = $request->id_cat_producto;

        //validaciones del formulario
  
        $this->validate($request,[
          'id_prod'=>'required|numeric',
          'nombre_prod'=>'required|regex:/^[\pL\s\-]+$/u',
          'archivo' => 'image|mimes:jpg,jpeg,gif,png',
          'descripcion_prod'=>'required|regex:/^[\pL\s\-]+$/u',
          'Existencia'=>'required|regex:/^[\pL\s\-]+$/u',
          'costo'=>'required|numeric',
          'u_m'=>'required|regex:/^[\pL\s\-]+$/u',
          'contenido'=>'required|regex:/^[\pL\s\-]+$/u',
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
  
        // insertar datos
      //  $prod = new productos;
      //  $cli -> archivo =$img2;
       $prod -> id_prod = $request->id_prod;
        $prod -> nombre_prod = $request->nombre_prod;
        //campo archivo de la base de datos
       // $prod -> archivo = $img2;
        $prod -> descripcion_prod = $request->descripcion_prod;
        $prod-> Existencia = $request->Existencia;
        $prod -> costo = $request->costo;
        $prod-> u_m = $request->u_m;
        $prod->  contenido = $request->contenido;
        $prod-> id_marca = $request -> id_marca;
        $prod-> id_cat_producto = $request -> id_cat_producto;
        $prod-> save();
  
        $titulo = "MODIFICACION DEl PRODUCTO";
        $mensaje1 = "El Producto fue guardado correctamente";
        return view ("cliente.mensaje1")
        ->with('titulo', $titulo)
        ->with('mensaje1', $mensaje1);
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

        $titulo = "Desactivar El producto";
        $mensaje1 = "El Producto a sido desactivado correctamente";
        return view ('cliente.mensaje1')
      ->with('titulo', $titulo)
      ->with('mensaje1', $mensaje1);
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
        $titulo = "Restaurar Producto";
        $mensaje1 = "El Producto a sido restaurado correctamente";
        return view ("cliente.mensaje1")
        ->with('titulo', $titulo)
        ->with('mensaje1', $mensaje1);
      }
      else
      {
        Session::flash('error', 'El usuario esta desactivado, favor de consultar a su administrador');
       return redirect()->route('login');
      }
      }



}
