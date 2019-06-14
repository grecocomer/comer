<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

// este  use se utiliza para mandar a llamar a las tablas de la base de datos.
use App\clientes;
use App\estados;
use App\empleados;
use App\proveedores;
use App\productos;
use App\marcaproductos;
use App\catproductos;
use App\empresas;
use App\servicios;
use App\catservicios;



class con1 extends Controller
{

  public function limpieza(){
  $res=\DB::select("SELECT * FROM productos WHERE id_cat_producto=1");

return view ('visproductos.limpieza')->with('productos',$res);
//return view('visproductos.limpieza');
  }

  public function seguridad(){
    $res=\DB::select("SELECT * FROM productos WHERE id_cat_producto=2");

return view ('visproductos.seguridad')->with('productos',$res);
      }
  // vista principal

  public function vistaprincipal()
  {
  //$res=\DB::select("SELECT p.id_prod, 
//p.nombre_prod, 
//p.archivo, 
//p.descripcion_prod, 
//p.Existencia, 
//p.costo,
//p.u_m, 
//p.contenido,
//m.nom_marca AS nomarc,
//c.nom_categoria AS nomcat,
//p.deleted_at
//FROM productos AS p 
//INNER JOIN catproductos AS c ON p.id_cat_producto = c.id_cat_producto
//INNER JOIN marcaproductos AS m ON p.id_marca = m.id_marca");

//return view ('principal.index1')->with('productos',$res);
    return view('principal.index1');
  }

         // reporte producto
public function reporteproductoin()
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

    return view ('principal.index1')->with('productos',$res);

    //$productos = productos::withTrashed()// solo desactiva el registro
    
  //$productos = productos::orderBy('nombre_prod','asc')->get();
  // rutas para mandar a llamar la vista 1.-carpeta 2.-nombre de la vista
 // return view ('producto.reporteprod')->with('productos',$productos);
}

    public function altacliente()
    {
        //el controlador manda a llamar a la vista alta cliente de la carpeta cliente
      // return view('cliente.altacliente');

          // selecciona los datos que contenga la tabla sexo y solo muestra los datos que se encuentren activos "SI"
      // select * from sexo
      // return view('welcome');
      // aqui esta el error
      // sirve para hacer que el cuadro de texto  siempre tenga el id lleno, siempre y cuando tengas tegristros
      // en la base de datos.
      $clavequesigue = clientes::orderBy('id','desc')
      ->take(1)
      ->get();
       $idc = $clavequesigue[0]->id+1;

       //muestra el combo con los datos activos en la base de datos.
      $generos = generos::where('activo','si')
    ->orderBy('genero','asc')
    ->get();
// DESPUES DE QUE VERIFICA TODOS LOS DATOS MANDA A LLAMAR A LA VISTA
//return $sexo;
return view ('cliente.altacliente')->with('generos', $generos)
                                   ->with('idc',$idc);
    }
  
  

    public function guardacliente(Request $request)
    {
      $id = $request->idcli;
      $nombrecli = $request->nombrecli;
      $apacli = $request->apacli;
      $amacli = $request->amacli;
      $correocli = $request->correocli;
      $telcli = $request->telcli;
      $callecli = $request->callecli;
      $no_ext = $request->no_ext;
      $no_int = $request->no_int;
      $colcli = $request->colcli;
      $locacli = $request->locacli;
      $muncli = $request->muncli;
      $estacli = $request->estacli;
      $cp = $request->cp;
      $Archivo = $request->Archivo;
  

      //validaciones del formulario

      $this->validate($request,[
        'id'=>'required|numeric',
        'nombrecli'=>'required|regex:/^[\pL\s\-]+$/u',
        'apacli'=>'required|regex:/^[\pL\s\-]+$/u',
        'amacli'=>'required|regex:/^[\pL\s\-]+$/u',
        'correocli'=>'required|email',
        'telcli'=>'required|numeric',
        'callecli'=>'required|regex:/^[\pL\s\-]+$/u',
        'no_ext'=>'required|numeric',
        'no_int'=>'required|numeric',
        'colcli'=>'required|regex:/^[\pL\s\-]+$/u',
        'locacli'=>'required|regex:/^[\pL\s\-]+$/u',
        'muncli'=>'required|regex:/^[\pL\s\-]+$/u',
        'estacli'=>'required|regex:/^[\pL\s\-]+$/u',
        'cp'=>'regex:/^[0-9]{5}$/',
        'Archivo' => 'image|mimes:jpg,jpeg,gif,png'
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
      $cli = new clientes;
    //  $cli -> archivo =$img2;
      $cli -> id = $request->id;
      $cli -> nombrecli = $request->nombrecli;
      $cli -> apacli = $request->apacli;
      $cli -> amacli = $request->amacli;
      $cli -> archivo = $img2;
      $cli -> correocli = $request->correocli;
      $cli -> telcli = $request->telcli;
      $cli -> callecli = $request->callecli;
      $cli -> no_ext = $request->no_ext;
      $cli -> no_int = $request->no_int;
      $cli -> colcli = $request->colcli;
      $cli -> locacli = $request->locacli;
      $cli -> muncli = $request->muncli;
      $cli -> estacli = $request->estacli;
      $cli -> cp = $request -> cp;
      $cli -> id_s = $request -> id_s;
      $cli -> save();

      $titulo = "ALTA DE CLIENTE";
      $mensaje1 = "El cliente fue guardado correctamente";
      return view ("cliente.mensaje1")
      ->with('titulo', $titulo)
      ->with('mensaje1', $mensaje1);
    }

//muestra los datos de los clientes
    public function reporteclientes()
    {
      $clientes = clientes::orderBy('nombrecli','asc')->get();
     return view ('cliente.reportecli')->with('clientes',$clientes);
    
     //  $res=\DB::select("SELECT c.id, c.nombrecli, c.apacli, c.amacli, c.archivo, c.correocli,
      // c.telcli, c.callecli, c.no_ext, c.no_int, c.colcli, c. locacli, c.muncli, c.estacli,
      // c.cp, g.genero as gene, c.deleted_at FROM clientes as c INNER JOIN generos as g ON c.id = g.id_s");

      // rutas para mandar a llamar la vista 1.-carpeta 2.-nombre de la vista
   //   return view ('cliente.reportecli')->with('clientes',$res);
    }

    public function eliminac($id)
    {
     // echo "El cliente a eliminar es $id";
     clientes::find($id)->delete();
     $titulo = "Desactivar cliente";
     $mensaje1 = "El cliente a sido desactivado correctamente";
     return view ('cliente.mensaje1')
     ->with('titulo',$titulo)
     ->with('mensaje1',$mensaje1);
     
    }
    // funcion para desactivar registros
    public function restaurarc($id)
    {
      //echo "El maestro a eliminar es $idm";
      clientes::withTrashed()->where('id',$id)->restore();
     // find($idm)->delete();
      $titulo = "Restaurar cliente";
      $mensaje1 = "El cliente a sido restaurado correctamente";
      return view ('cliente.mensaje1')
      ->with('titulo',$titulo)
      ->with('mensaje1',$mensaje1);
    }


    public function modificac($id)
    {
     // echo "Cliente modificado $id";
     $cliente = clientes::where('id','=',$id)->get();
     $id_s=$cliente[0]->id_s;
     $genero = generos::where('id_s','=',$id_s)->get();
     $demas = clientes::where('id_s','!=',$id_s)->get();


     return view('cliente.modificacliente')
     // el cero es para que todos los datos de la consulta aparezcan
     ->with('clientes',$cliente[0])
     ->with('id_s',$id_s)
     ->with('generos',$genero[0]->genero)
     ->with('demas',$demas);

    }
    
    public function guardaedicionc(Request $request)
    {
      $id = $request->id;
      $nombrecli = $request->nombrecli;
      $apacli = $request->apacli;
      $amacli = $request->amacli;
      $correocli = $request->correocli;
      $telcli = $request->telcli;
      $callecli = $request->callecli;
      $no_ext = $request->no_ext;
      $no_int = $request->no_int;
      $colcli = $request->colcli;
      $locacli = $request->locacli;
      $muncli = $request->muncli;
      $estacli = $request->estacli;
      $cp = $request->cp;

  

      //validaciones del formulario

      $this->validate($request,[
        
        'nombrecli'=>'required|regex:/^[\pL\s\-]+$/u',
        'apacli'=>'required|regex:/^[\pL\s\-]+$/u',
        'amacli'=>'required|regex:/^[\pL\s\-]+$/u',
        'correocli'=>'required|email',
        'telcli'=>'required|numeric',
        'callecli'=>'required|regex:/^[\pL\s\-]+$/u',
        'no_ext'=>'required|numeric',
        'no_int'=>'required|numeric',
        'colcli'=>'required|regex:/^[\pL\s\-]+$/u',
        'locacli'=>'required|regex:/^[\pL\s\-]+$/u',
        'muncli'=>'required|regex:/^[\pL\s\-]+$/u',
        'estacli'=>'required|regex:/^[\pL\s\-]+$/u',
        'cp'=>'regex:/^[0-9]{5}$/',
        'Archivo' => 'image|mimes:jpg,jpeg,gif,png'
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

// insertar datos
$cli = clientes::find($id);
if ($file!="")
{
  $cli->archivo=$img2;
}

// $maest -> archivo =$img2;
      // insertar datos
     //$cli = new clientes;
    //  $cli -> archivo =$img2;
    $cli -> id = $request->id;
    $cli -> nombrecli = $request->nombrecli;
    $cli -> apacli = $request->apacli;
    $cli -> amacli = $request->amacli;
   // $cli -> Archivo = $img2;
    $cli -> correocli = $request->correocli;
    $cli -> telcli = $request->telcli;
    $cli -> callecli = $request->callecli;
    $cli -> no_ext = $request->no_ext;
    $cli -> no_int = $request->no_int;
    $cli -> colcli = $request->colcli;
    $cli -> locacli = $request->locacli;
    $cli -> muncli = $request->muncli;
    $cli -> estacli = $request->estacli;
    $cli -> cp = $request -> cp;
    $cli -> id_s = $request -> id_s;
      $cli -> save();

      $titulo = "MODIFICACION DEL CLIENTE";
      $mensaje1 = "El cliente fue modificado correctamente";
      return view ("cliente.mensaje1")
      ->with('titulo', $titulo)
      ->with('mensaje1', $mensaje1);
    }



    // EMPLEADO
    public function altaempleados()
    {
        //el controlador manda a llamar a la vista alta empleado de la carpeta empleado
      // return view('empleado.altaempleado');

          // selecciona los datos que contenga la tabla sexo y solo muestra los datos que se encuentren activos "SI"
      // select * from sexo
      // return view('welcome');
      // aqui esta el error
      // sirve para hacer que el cuadro de texto  siempre tenga el id lleno, siempre y cuando tengas tegristros
      // en la base de datos.
    $clavequesiguee = empleados ::orderBy('id_emp','desc')
    ->take(1)
    ->get();
     $idc = $clavequesiguee[0]->id_emp+1;

     //muestra el combo con los datos activos en la base de datos.
    $generos = generos::where('activo','si')
  ->orderBy('genero','asc')
  ->get();

// DESPUES DE QUE VERIFICA TODOS LOS DATOS MANDA A LLAMAR A LA VISTA
//return $sexo;
return view ('empleado.altaempleado')->with('generos', $generos)
                                    ->with('idc',$idc);
                       
    } 

    public function guardaempleado(Request $request)
    {
    

      //validaciones del formulario

      $this->validate($request,[
        'id_emp'=>'required|numeric',
        'nombre_emp'=>'required|regex:/^[\pL\s\-]+$/u',
        'apa_emp'=>'required|regex:/^[\pL\s\-]+$/u',
        'ama_emp'=>'required|regex:/^[\pL\s\-]+$/u',
        'correo'=>'required|email',
        'telemp'=>'required|numeric',
        'calle_emp'=>'required|regex:/^[\pL\s\-]+$/u',
        'no_ext'=>'required|numeric',
        'no_int'=>'required|numeric',
        'rfc'=>'required|regex:/^[A-Z]{4}[0-9]{6}[A-Z,0-9]{3}$/u',
        'colemp'=>'required|regex:/^[\pL\s\-]+$/u',
        'locaemp'=>'required|regex:/^[\pL\s\-]+$/u',
        'munemp'=>'required|regex:/^[\pL\s\-]+$/u',
        'estaemp'=>'required|regex:/^[\pL\s\-]+$/u',
        'cp'=>'regex:/^[0-9]{5}$/',
        'archivo' => 'image|mimes:jpg,jpeg,gif,png'
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
      $em = new empleados;
    //  $cli -> archivo =$img2;
      $em -> id_emp = $request->id_emp;
      $em -> nombre_emp = $request->nombre_emp;
      $em -> apa_emp = $request->apa_emp;
      $em -> ama_emp = $request->ama_emp;
      $em -> archivo = $img2;
      $em-> correo = $request->correo;
      $em -> telemp = $request->telemp;
      $em -> calle_emp = $request->calle_emp;
      $em -> no_ext = $request->no_ext;
      $em -> no_int = $request->no_int;
      $em -> rfc = $request->rfc;
      $em -> colemp = $request->colemp;
      $em -> locaemp = $request->locaemp;
      $em -> munemp = $request->munemp;
      $em -> estaemp = $request->estaemp;
      $em -> cp = $request -> cp;
      $em -> id_s = $request -> id_s;
      $em -> save();

      $titulo = "ALTA DE EMPLEADO";
      $mensaje1 = "El empleado fue guardado correctamente";
      return view ("cliente.mensaje1")
      ->with('titulo', $titulo)
      ->with('mensaje1', $mensaje1);

    }

    //muestra los datos de los empleados
    public function reporteempleado()
    {
      $empleados = empleados::orderBy('nombre_emp','asc')->get();
      // rutas para mandar a llamar la vista 1.-carpeta 2.-nombre de la vista
      return view ('empleado.reporteemp')->with('empleados',$empleados);
    }

//proveedor

public function altaproveedor()
{
    //el controlador manda a llamar a la vista alta proveedor de la carpeta proveedor
  // return view('cliente.altacliente');

      // selecciona los datos que contenga la tabla sexo y solo muestra los datos que se encuentren activos "SI"
  // select * from sexo
  // return view('welcome');
  // aqui esta el error
  // sirve para hacer que el cuadro de texto  siempre tenga el id lleno, siempre y cuando tengas tegristros
  // en la base de datos.
  $clavequesigue = proveedores::orderBy('id_prov','desc')
  ->take(1)
  ->get();
   $idv = $clavequesigue[0]->id_prov+1;

   //muestra el combo con los datos activos en la base de datos.
  $generos = generos::where('activo','si')
->orderBy('genero','asc')
->get();
// DESPUES DE QUE VERIFICA TODOS LOS DATOS MANDA A LLAMAR A LA VISTA
//return $sexo;
return view ('proveedor.altaproveedor')->with('generos', $generos)
                               ->with('idv',$idv);
}
   
public function guardaproveedor(Request $request)
    {
    

      //validaciones del formulario

      $this->validate($request,[
        'id_prov'=>'required|numeric',
        'nombre_prov'=>'required|regex:/^[\pL\s\-]+$/u',
        'apa_prov'=>'required|regex:/^[\pL\s\-]+$/u',
        'ama_prov'=>'required|regex:/^[\pL\s\-]+$/u',
        'correo_prov'=>'required|email',
        'tel_prov'=>'required|numeric',
        'calle_prov'=>'required|regex:/^[\pL\s\-]+$/u',
        'no_ext'=>'required|numeric',
        'no_int'=>'required|numeric',
        'col_prov'=>'required|regex:/^[\pL\s\-]+$/u',
        'loca_prov'=>'required|regex:/^[\pL\s\-]+$/u',
        'mun_prov'=>'required|regex:/^[\pL\s\-]+$/u',
        'esta_prov'=>'required|regex:/^[\pL\s\-]+$/u',
        'cp'=>'regex:/^[0-9]{5}$/',
        'archivo' => 'image|mimes:jpg,jpeg,gif,png'
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
      $pro = new proveedores;
    //  $cli -> archivo =$img2;
      $pro -> id_prov = $request->id_prov;
      $pro -> nombre_prov = $request->nombre_prov;
      $pro -> apa_prov = $request->apa_prov;
      $pro -> ama_prov = $request->ama_prov;
      $pro -> archivo = $img2;
      $pro-> correo_prov = $request->correo_prov;
      $pro -> tel_prov = $request->tel_prov;
      $pro-> calle_prov = $request->calle_prov;
      $pro-> no_ext = $request->no_ext;
      $pro-> no_int = $request->no_int;
      $pro-> col_prov = $request->col_prov;
      $pro-> loca_prov = $request->loca_prov;
      $pro-> mun_prov = $request->mun_prov;
      $pro-> esta_prov = $request->esta_prov;
      $pro-> cp = $request -> cp;
      $pro-> id_s = $request -> id_s;
      $pro-> save();

      $titulo = "ALTA DE PROVEEDOR";
      $mensaje1 = "El Proveedor fue guardado correctamente";
      return view ("cliente.mensaje1")
      ->with('titulo', $titulo)
      ->with('mensaje1', $mensaje1);

    }

// reporte proveedor
public function reporteproveedor()
{
  $proveedores = proveedores::orderBy('nombre_prov','asc')->get();
  // rutas para mandar a llamar la vista 1.-carpeta 2.-nombre de la vista
  return view ('proveedor.reporteprov')->with('proveedores',$proveedores);
}


// productos


public function altaproducto()
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

   public function guardaproducto(Request $request)
    {
    

      //validaciones del formulario

      $this->validate($request,[
        'id_prod'=>'required|numeric',
        'nombre_prod'=>'required|regex:/^[\pL\s\-]+$/u',
        'archivo' => 'image|mimes:jpg,jpeg,gif,png',
        'descripcion_prod'=>'required|regex:/^[\pL\s\-]+$/u',
        'Existencia'=>'required|numeric',
        'costo'=>'required|numeric',
        'u_m'=>'required|numeric',
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

    //consulta para hacer uns multiconsulta de varias tablas                       
 
   /** $res=\DB::select("SELECT p.id_prod, 
    p.nombre_prod, 
    p.archivo, 
    p.descripcion_prod, 
    p.Existencia, p.costo,
    p.u_m, 
    p.contenido,
    m.nom_marca, 
    c.nom_categoria
    FROM productos p 
    INNER JOIN catproductos AS c ON p.id_prod = c.id_cat_producto
    INNER JOIN marcaproductos AS m ON p.id_prod = m.id_marca"); */

    //$productos = productos::withTrashed()// solo desactiva el registro
    
  $productos = productos::orderBy('nombre_prod','asc')->get();
  // rutas para mandar a llamar la vista 1.-carpeta 2.-nombre de la vista
  return view ('producto.reporteprod')->with('productos',$productos);
}



      public function modificaproductos($id_prod)
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
      public function guardaedicionp(Request $request)
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
          'Existencia'=>'required|numeric',
          'costo'=>'required|numeric',
          'u_m'=>'required|numeric',
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
  
      // desactivar registros
      //en esta funcion no cargan los estilos todo lo demas funciona bien
      public function eliminaproducto($id_prod)
      {
        //echo "El maestro a eliminar es $id_prod";
        productos::find($id_prod)->delete();

        $titulo = "Desactivar El producto";
        $mensaje1 = "El Producto a sido desactivado correctamente";
        return view ('cliente.mensaje1')
      ->with('titulo', $titulo)
      ->with('mensaje1', $mensaje1);

      }

      //en esta funcion no cargan los estilos todo lo demas funciona bien
      public function restaurarproducto($id_prod)
      {
       
        productos::withTrashed()->where('id_prod',$id_prod)->restore();
       // find($idm)->delete();
        $titulo = "Restaurar Producto";
        $mensaje1 = "El Producto a sido restaurado correctamente";
        return view ("cliente.mensaje1")
        ->with('titulo', $titulo)
        ->with('mensaje1', $mensaje1);
      }

// servicios

    public function altaservicio()
    {
       // return view('servicio.altaservicio');
        //el controlador manda a llamar a la vista alta producto de la carpeta producto
      // selecciona los datos que contenga la tabla sexo y solo muestra los datos que se encuentren activos "SI"
  // select * from sexo
  // return view('welcome');
  // aqui esta el error
  // sirve para hacer que el cuadro de texto  siempre tenga el id lleno, siempre y cuando tengas tegristros
  // en la base de datos.
  $clavequesigue = servicios::orderBy('id_ser','desc')
  ->take(1)
  ->get();
   $ids = $clavequesigue[0]->id_ser+1;

   //muestra el combo con los datos activos en la base de datos.
  $empresas = empresas::where('activo','si')
->orderBy('nombre_empresa','asc')
->get();

$empleados = empleados::orderBy('nombre_emp','asc')
->get();

$catservicios = catservicios::where('activo','si')
->orderBy('nom_cate','asc')
->get();
// DESPUES DE QUE VERIFICA TODOS LOS DATOS MANDA A LLAMAR A LA VISTA
return view ('servicio.altaservicio')->with('empresas', $empresas)
                                     ->with('empleados', $empleados)
                                     ->with('catservicios',$catservicios)
                                     ->with('ids',$ids);
    }

  // guarda servicio
  public function guardaservicio(Request $request)
  {
  

    //validaciones del formulario

    $this->validate($request,[
      'id_ser'=>'required|numeric',
      'nombre_ser'=>'required|regex:/^[\pL\s\-]+$/u',
      'descripcion_ser'=>'required|regex:/^[\pL\s\-]+$/u',
      'fecha_solicitud_ser'=>'required|date',
      'fecha_inicio_ser'=>'required|date',
      'fecha_fin_ser'=>'required|date',
    ]);   

    // insertar datos
    $ser = new servicios;
    $ser -> id_ser = $request->id_ser;
    $ser -> nombre_ser = $request->nombre_ser;
    $ser -> descripcion_ser = $request->descripcion_ser;
    $ser-> fecha_solicitud_ser = $request->fecha_solicitud_ser;
    $ser-> fecha_inicio_ser = $request->fecha_inicio_ser;
    $ser-> fecha_fin_ser = $request->fecha_fin_ser;
    $ser-> id_empresa = $request -> id_empresa;
    $ser-> id_emp = $request -> id_emp;
    $ser-> id_cat_ser = $request -> id_cat_ser;
    $ser-> save();

    $titulo = "ALTA DE SERVICIO";
    $mensaje1 = "El servicio fue guardado correctamente";
    return view ("cliente.mensaje1")
    ->with('titulo', $titulo)
    ->with('mensaje1', $mensaje1);

  }

  public function reporteservicio()
{
  $servicios = servicios::orderBy('nombre_ser','asc')->get();
  // rutas para mandar a llamar la vista 1.-carpeta 2.-nombre de la vista
  return view ('servicio.reporteser')->with('servicios',$servicios);
}





}
