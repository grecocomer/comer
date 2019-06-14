<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

// este  use se utiliza para mandar a llamar a las tablas de la base de datos.
use App\clientes;
use App\estados;
use Session; 

class concliente extends Controller
{
    public function altacliente()
    {
      if(Session::get('sesionidu')!="")
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
      $estados = estados::where('activo','si')
    ->orderBy('estado','asc')
    ->get();
// DESPUES DE QUE VERIFICA TODOS LOS DATOS MANDA A LLAMAR A LA VISTA
//return $sexo;
return view ('cliente.altacliente')->with('estados', $estados)
                                   ->with('idc',$idc);
                                  }
                                  else
                                  {
                                    Session::flash('error', 'El usuario esta desactivado, favor de consultar a su administrador');
                                   return redirect()->route('login');
                                  }
    }
  
  

    public function guardacliente(Request $request)
    {
      $id = $request->idcli;
      $nombrecli = $request->nombrecli;
      $apacli = $request->apacli;
      $amacli = $request->amacli;
      $correocli = $request->correocli;
      $telcli = $request->telcli;
      $genero = $request->genero;
      $callecli = $request->callecli;
      $no_ext = $request->no_ext;
      $no_int = $request->no_int;
      $colcli = $request->colcli;
      $locacli = $request->locacli;
      $muncli = $request->muncli;
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
      $cli -> genero = $request->genero;
      $cli -> callecli = $request->callecli;
      $cli -> no_ext = $request->no_ext;
      $cli -> no_int = $request->no_int;
      $cli -> colcli = $request->colcli;
      $cli -> locacli = $request->locacli;
      $cli -> muncli = $request->muncli;
      $cli -> cp = $request -> cp;
      $cli -> id_es = $request -> id_es;
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
      if(Session::get('sesionidu')!="")
		{
    //  $clientes = clientes::orderBy('nombrecli','asc')->get();
    // return view ('cliente.reportecli')->with('clientes',$clientes);
    
      $res=\DB::select("SELECT c.id, 
      c.nombrecli, 
      c.apacli,
       c.amacli, 
       c.archivo, 
       c.correocli,
      c.telcli, 
      c.genero,
      c.cp, g.estado as esta, c.deleted_at FROM clientes as c INNER JOIN estados as g ON c.id_es = g.id_es");

   //   rutas para mandar a llamar la vista 1.-carpeta 2.-nombre de la vista
     return view ('cliente.reportecli')->with('clientes',$res);
    }
    else
    {
      Session::flash('error', 'El usuario esta desactivado, favor de consultar a su administrador');
     return redirect()->route('login');
    }
    }

    public function eliminac($id)
    {
      if(Session::get('sesionidu')!="")
		{
     // echo "El cliente a eliminar es $id";
     clientes::find($id)->delete();
     $titulo = "Desactivar cliente";
     $mensaje1 = "El cliente a sido desactivado correctamente";
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
    public function restaurarc($id)
    {
      if(Session::get('sesionidu')!="")
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
    else
    {
      Session::flash('error', 'El usuario esta desactivado, favor de consultar a su administrador');
     return redirect()->route('login');
    }
    }


    public function modificac($id)
    {
      if(Session::get('sesionidu')!="")
		{
     // echo "Cliente modificado $id";
     $cliente = clientes::where('id','=',$id)->get();
     $id_es=$cliente[0]->id_es;
     $estado = estados::where('id_es','=',$id_es)->get();
     $demas = estados::where('id_es','!=',$id_es)->get();


     return view('cliente.modificacliente')
     // el cero es para que todos los datos de la consulta aparezcan
     ->with('clientes',$cliente[0])
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
    
    public function guardaedicionc(Request $request)
    {
      if(Session::get('sesionidu')!="")
		{
      $id = $request->id;
      $nombrecli = $request->nombrecli;
      $apacli = $request->apacli;
      $amacli = $request->amacli;
      $correocli = $request->correocli;
      $telcli = $request->telcli;
      $genero = $request->genero;
      $archivo = $request->archivo;
      $callecli = $request->callecli;
      $no_ext = $request->no_ext;
      $no_int = $request->no_int;
      $colcli = $request->colcli;
      $locacli = $request->locacli;
      $muncli = $request->muncli;
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
        'cp'=>'regex:/^[0-9]{5}$/',
        'Archivo' => 'image|mimes:jpg,jpeg,gif,png,jpg,JPG'
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
      // insertar datos
     //$cli = new clientes;
    //  $cli -> archivo =$img2;
    $cli -> id = $request->id;
    $cli -> nombrecli = $request->nombrecli;
    $cli -> apacli = $request->apacli;
    $cli -> amacli = $request->amacli;
   //$cli -> Archivo = $img2;
    $cli -> correocli = $request->correocli;
    $cli -> telcli = $request->telcli;
    $cli -> genero = $request->genero;
    $cli -> callecli = $request->callecli;
    $cli -> no_ext = $request->no_ext;
    $cli -> no_int = $request->no_int;
    $cli -> colcli = $request->colcli;
    $cli -> locacli = $request->locacli;
    $cli -> muncli = $request->muncli;
    $cli -> cp = $request -> cp;
    $cli -> id_es = $request -> id_es;
      $cli -> save();

      $titulo = "MODIFICACION DEL CLIENTE";
      $mensaje1 = "El cliente fue modificado correctamente";
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
