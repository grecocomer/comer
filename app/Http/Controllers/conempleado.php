<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;


// este  use se utiliza para mandar a llamar a las tablas de la base de datos.
use App\empleados;
use App\estados;
use Session; 

class conempleado extends Controller
{
    // EMPLEADO
    public function altaempleados()
    {
      if(Session::get('sesionidu')!="")
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
    $estados = estados::where('activo','si')
  ->orderBy('estado','asc')
  ->get();

// DESPUES DE QUE VERIFICA TODOS LOS DATOS MANDA A LLAMAR A LA VISTA
//return $sexo;
return view ('empleado.altaempleado')->with('estados', $estados)
                                    ->with('idc',$idc);
                                  }
                                  else
                                  {
                                    Session::flash('error', 'El usuario esta desactivado, favor de consultar a su administrador');
                                   return redirect()->route('login');
                                  }
    } 

    public function guardaempleado(Request $request)
    {
      if(Session::get('sesionidu')!="")
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
        //'rfc'=>'required|regex:/^[A-Z]{4}[0-9]{6}[A-Z,0-9]{3}$/u',
        'colemp'=>'required|regex:/^[\pL\s\-]+$/u',
        'locaemp'=>'required|regex:/^[\pL\s\-]+$/u',
        'cp'=>'regex:/^[0-9]{5}$/',
        //'cp'=>'regex:/^[0-9][A-Z][A-Z,a-z]*{5}$/',sirve para 1 numero,1 letra,1 o varias letras y un numero por
        // su terminacion 5
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
      $em-> genero = $request->genero;
      $em -> telemp = $request->telemp;
      $em -> calle_emp = $request->calle_emp;
      $em -> no_ext = $request->no_ext;
      $em -> no_int = $request->no_int;
      $em -> rfc = $request->rfc;
      $em -> colemp = $request->colemp;
      $em -> locaemp = $request->locaemp;
      $em -> cp = $request -> cp;
      $em -> id_es = $request -> id_es;
      $em -> save();

      $titulo = "ALTA DE EMPLEADO";
      $mensaje1 = "El empleado fue guardado correctamente";
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

    //muestra los datos de los empleados
    public function reporteempleado()
    {
      if(Session::get('sesionidu')!="")
		{
     // $empleados = empleados::orderBy('nombre_emp','asc')->get();
      // rutas para mandar a llamar la vista 1.-carpeta 2.-nombre de la vista
      //return view ('empleado.reporteemp')->with('empleados',$empleados);

$res=\DB::select("SELECT em.id_emp, em.nombre_emp, em.apa_emp, em.ama_emp, em.rfc,
                  em.archivo,em.telemp,em.correo,em.calle_emp, em.no_ext, em.no_int,
                  em.colemp, em.locaemp,em.cp, g.estado AS gene, em.deleted_at 
                  FROM empleados AS em
                  INNER JOIN estados AS g ON em.id_es = g.id_es");

   //   rutas para mandar a llamar la vista 1.-carpeta 2.-nombre de la vista
     return view ('empleado.reporteemp')->with('empleados',$res);
    }
    else
    {
      Session::flash('error', 'El usuario esta desactivado, favor de consultar a su administrador');
     return redirect()->route('login');
    }
    }

    public function eliminae($id_emp)
    {
      if(Session::get('sesionidu')!="")
		{
    // echo "El cliente a eliminar es $id";
    // aqui esta el error
    empleados::find($id_emp)->delete();
    $titulo = "Desactivar Empleado";
    $mensaje1 = "El Empleado a sido desactivado correctamente";
    return view ('cliente.mensaje1')
    ->with('titulo',$titulo)
    ->with('mensaje1',$mensaje1);
  }
  else
  {
    Session::flash('error', 'El usuario esta desactivado, favor de consultar a su administrador');
   return redirect()->route('login');
  }
     
    }
    // funcion para desactivar registros
    public function restaurare($id_emp)
    {
      if(Session::get('sesionidu')!="")
		{
      //echo "El maestro a eliminar es $idm";
      empleados::withTrashed()->where('id_emp',$id_emp)->restore();
     // find($idm)->delete();
      $titulo = "Restaurar Empleado";
      $mensaje1 = "El Empleado a sido restaurado correctamente";
      return view ('cliente.mensaje1')
      ->with('titulo',$titulo)
      ->with('mensaje1',$mensaje1);
    }
    else
    {
      Session::flash('error', 'El usuario esta desactivado, favor de consultar a su administrador');
     return redirect()->route('login');
    }
    }

    public function modificae($id_emp)
    {
      if(Session::get('sesionidu')!="")
		{
     // echo "Cliente modificado $id_emp";
     $empleado = empleados::where('id_emp','=',$id_emp)->get();
     $id_es=$empleado[0]->id_es;
     $estado = estados::where('id_es','=',$id_es)->get();
     $demas = estados::where('id_es','!=',$id_es)->get();


     return view('empleado.modificaempleado')
     // el cero es para que todos los datos de la consulta aparezcan
     ->with('empleados',$empleado[0])
     ->with('id_es',$id_es)
     ->with('estados',$estado[0]->estado)
     ->with('demas',$demas);
    }
    else
    {
      Session::flash('error', 'El usuario esta desactivado, favor de consultar a su administrador');
     return redirect()->route('login');
    }
    }

    public function guardaedicione(Request $request)
    {
      if(Session::get('sesionidu')!="")
		{
      $id_emp = $request->id_emp;
      $nombre_emp = $request->nombre_emp;
      $apa_emp = $request->apa_emp;
      $ama_emp = $request->ama_emp;
      $rfc = $request->rfc;
      $telemp = $request->telemp;
      $genero = $request->genero;
      $correo = $request->correo;
      $calle_emp = $request->calle_emp;
      $no_ext = $request->no_ext;
      $no_int = $request->no_int;
      $colemp = $request->colemp;
      $locaemp = $request->locaemp;
     // $munemp = $request->muncli;
      $cp = $request->cp;

  

      //validaciones del formulario

      $this->validate($request,[
        
        'nombre_emp'=>'required|regex:/^[\pL\s\-]+$/u',
        'apa_emp'=>'required|regex:/^[\pL\s\-]+$/u',
        'ama_emp'=>'required|regex:/^[\pL\s\-]+$/u',
       'rfc'=>'required|regex:/^[A-Z]{4}[0-9]{6}[A-Z,0-9]{3}$/u',
        'correo'=>'required|email',
        'telemp'=>'required|numeric',
        'calle_emp'=>'required|regex:/^[\pL\s\-]+$/u',
        'no_ext'=>'required|numeric',
        'no_int'=>'required|numeric',
        'colemp'=>'required|regex:/^[\pL\s\-]+$/u',
        'locaemp'=>'required|regex:/^[\pL\s\-]+$/u',
     //   'munemp'=>'required|regex:/^[\pL\s\-]+$/u',
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
$emp = empleados::find($id_emp);
$emp->id_emp = $request->id_emp;
if ($file!="")
{
  $emp->archivo=$img2;
}
    $emp->id_emp = $request->id_emp;
    $emp ->nombre_emp = $request->nombre_emp;
    $emp ->apa_emp= $request->apa_emp;
    $emp ->ama_emp = $request->ama_emp;
    $emp ->rfc = $request->rfc;
  //  $emp ->archivo = $request->$img2;
    $emp ->correo = $request->correo;
    $emp ->telemp = $request->telemp;
    $emp ->genero = $request->genero;
    $emp ->calle_emp = $request->calle_emp;
    $emp ->no_ext = $request->no_ext;
    $emp ->no_int = $request->no_int;
    $emp ->colemp = $request->colemp;
    $emp ->locaemp = $request->locaemp;
  //  $emp -> munemp = $request->munemp;
    $emp -> cp = $request -> cp;
    $emp -> id_es = $request -> id_es;
      $emp -> save();

      $titulo = "MODIFICACION DEL EMPLEADO";
      $mensaje1 = "El empleado fue modificado correctamente";
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
