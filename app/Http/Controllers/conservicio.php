<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\empresas;
use App\servicios;
use App\empleados;
use App\catservicios;
use Session; 

class conservicio extends Controller
{
   
// servicios

public function altaservicio()
{
  if(Session::get('sesionidu')!="")
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
                                else
                                {
                                  Session::flash('error', 'El usuario esta desactivado, favor de consultar a su administrador');
                                 return redirect()->route('login');
                                }
}

// guarda servicio
public function guardaservicio(Request $request)
{
  if(Session::get('sesionidu')!="")
  {

//validaciones del formulario

$this->validate($request,[
  'id_ser'=>'required|numeric',
  'nombre_ser'=>'required|regex:/^[\pL\s\-]+$/u',
  'descripcion_ser'=>'required|regex:/^[\pL\s\-]+$/u',
  'costo'=>'required|numeric',
  'fecha_solicitud_ser'=>'required|date',
  'fecha_inicio_ser'=>'required|date',
  'fecha_fin_ser'=>'required|date',
]);   

// insertar datos
$ser = new servicios;
$ser -> id_ser = $request->id_ser;
$ser -> nombre_ser = $request->nombre_ser;
$ser -> descripcion_ser = $request->descripcion_ser;
$ser -> costo = $request->costo;
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
else
{
  Session::flash('error', 'El usuario esta desactivado, favor de consultar a su administrador');
 return redirect()->route('login');
}
}

public function reporteservicio()
{
  if(Session::get('sesionidu')!="")
		{
//$servicios = servicios::orderBy('nombre_ser','asc')->get();
// rutas para mandar a llamar la vista 1.-carpeta 2.-nombre de la vista
//return view ('servicio.reporteser')->with('servicios',$servicios);

//consulta para hacer uns multiconsulta de varias tablas                       
 
$jio=\DB::select("SELECT s.id_ser, 
s.nombre_ser, 
s.descripcion_ser, 
s.fecha_solicitud_ser,
s.fecha_inicio_ser,
s.fecha_fin_ser, 
em.nombre_empresa AS noe, 
ep.nombre_emp AS noem,
c.nom_cate AS nocat,
s.deleted_at
FROM servicios AS s 
INNER JOIN empresas AS em ON em.id_empresa = s.id_empresa
INNER JOIN empleados AS ep ON ep.id_emp = s.id_emp
INNER JOIN catservicios AS c ON c.id_cat_ser = s.id_cat_ser");
//poner un alias a cada celda para que el alias se mande a la ista reporte-->
// igualar en id = al id de la tabla de la llave foranea 

return view ('servicio.reporteser')->with('servicios',$jio);
}
else
{
  Session::flash('error', 'El usuario esta desactivado, favor de consultar a su administrador');
 return redirect()->route('login');
}
}

public function eliminaservicio($id_ser)
      {
        if(Session::get('sesionidu')!="")
		{
        //echo "El maestro a eliminar es $id_prod";
        servicios::find($id_ser)->delete();

        $titulo = "Desactivar El Servicio";
        $mensaje1 = "El Servicio a sido desactivado correctamente";
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
      public function restaurarservicio($id_ser)
      {
        if(Session::get('sesionidu')!="")
        {
       
        servicios::withTrashed()->where('id_ser',$id_ser)->restore();
       // find($idm)->delete();
        $titulo = "Restaurar Servicio";
        $mensaje1 = "El Servicio a sido restaurado correctamente";
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

      public function modificaservicios($id_ser)
      {
        if(Session::get('sesionidu')!="")
        {
       
      //  echo "Maestro modificado $idm";

      $s = servicios::where('id_ser','=',$id_ser)->get();

      $id_empresa=$s[0]->id_empresa;
      $id_emp=$s[0]->id_emp;
      $id_cat_ser=$s[0]->id_cat_ser;

      $empre = empresas::where('id_empresa','=',$id_empresa)->get();
      $empresas = empresas::where('id_empresa','!=',$id_empresa)->get();

      $emp = empleados::where('id_emp','=',$id_emp)->get();
      $empleados = empleados::where('id_emp','!=',$id_emp)->get();
      
      $cate =catservicios::where('id_cat_ser','=',$id_cat_ser)->get();
      $catservicios = catservicios::where('id_cat_ser','!=',$id_cat_ser)->get();

      return view('servicio.modificaservicio')
      // el cero es para que todos los datos de la consulta aparezcan
      ->with('servicios',$s[0])

      ->with('id_empresa',$id_empresa)
      ->with('empre',$empre [0]->nombre_empresa)
      ->with('empresas',$empresas)

      ->with('id_emp',$id_emp)
      ->with('emp',$emp[0]->nombre_emp)
      ->with('empleados',$empleados)

      ->with('id_cat_ser',$id_cat_ser)
      ->with('cate',$cate[0]->nom_categoria)
      ->with('catservicios',$catservicios);
    }
    else
    {
      Session::flash('error', 'El usuario esta desactivado, favor de consultar a su administrador');
     return redirect()->route('login');
    }
      }

      public function guardaedicionser(Request $request)
      {
        if(Session::get('sesionidu')!="")
        {
        $id_ser = $request->id_ser;
        $nombre_ser = $request->nombre_ser;
        $descripcion_ser = $request->descripcion_ser;
        $costo = $request->costo;
        $fecha_solicitud_ser = $request->fecha_solicitud_ser;
        $fecha_inicio_ser = $request->fecha_inicio_ser;
        $fecha_fin_ser = $request->fecha_fin_ser;
        $contenido = $request->contenido;
        $id_empresa = $request->id_empresa;
        $id_emp = $request->id_emp;
        $id_cat_ser = $request->id_cat_ser;


        //validaciones del formulario
  
        $this->validate($request,[
          'id_ser'=>'required|numeric',
          'nombre_ser'=>'required|regex:/^[\pL\s\-]+$/u',
          'descripcion_ser'=>'required|regex:/^[\pL\s\-]+$/u',
          'costo'=>'required|numeric',
          'fecha_solicitud_ser'=>'required|date',
          'fecha_inicio_ser'=>'required|date',
          'fecha_fin_ser'=>'required|date',
        ]);   
        
          $ser = servicios::find($id_ser);
  
        // insertar datos
      
       $ser -> id_ser = $request->id_ser;
        $ser -> nombre_ser = $request->nombre_ser;
        $ser -> descripcion_ser = $request->descripcion_ser;
        $ser -> costo = $request->costo;
        $ser-> fecha_solicitud_ser = $request->fecha_solicitud_ser;
        $ser -> fecha_inicio_ser = $request->fecha_inicio_ser;
        $ser-> fecha_fin_ser = $request->fecha_fin_ser;
        $ser->  id_empresa = $request->id_empresa;
        $ser-> id_emp = $request -> id_emp;
        $ser-> id_cat_ser = $request -> id_cat_ser;
        $ser-> save();
  
        $titulo = "MODIFICACION DEl SERVICIO";
        $mensaje1 = "El Servicio fue guardado correctamente";
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
