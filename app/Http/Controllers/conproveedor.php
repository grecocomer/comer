<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

// este  use se utiliza para mandar a llamar a las tablas de la base de datos.
use App\estados;
use App\proveedores;
use Session; 


class conproveedor extends Controller
{
    //proveedor
    

public function altaproveedor()
{
  if(Session::get('sesionidu')!="")
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
  $estados = estados::where('activo','si')
->orderBy('estado','asc')
->get();
// DESPUES DE QUE VERIFICA TODOS LOS DATOS MANDA A LLAMAR A LA VISTA
//return $sexo;
return view ('proveedor.altaproveedor')->with('estados', $estados)
                               ->with('idv',$idv);
                              }
                              else
                              {
                                Session::flash('error', 'El usuario esta desactivado, favor de consultar a su administrador');
                               return redirect()->route('login');
                              }
}
   
public function guardaproveedor(Request $request)
    {
      if(Session::get('sesionidu')!="")
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
      $pro -> genero = $request->genero;
      $pro-> calle_prov = $request->calle_prov;
      $pro-> no_ext = $request->no_ext;
      $pro-> no_int = $request->no_int;
      $pro-> col_prov = $request->col_prov;
      $pro-> loca_prov = $request->loca_prov;
      $pro-> mun_prov = $request->mun_prov;
      $pro-> cp = $request -> cp;
      $pro-> id_es = $request -> id_es;
      $pro-> save();

      $titulo = "ALTA DE PROVEEDOR";
      $mensaje1 = "El Proveedor fue guardado correctamente";
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

// reporte proveedor
public function reporteproveedor()
{
  if(Session::get('sesionidu')!="")
		{
  //$proveedores = proveedores::orderBy('nombre_prov','asc')->get();

  $jiovani=\DB::select("SELECT p.id_prov, p.nombre_prov, p.apa_prov, p.ama_prov, p.archivo, p.correo_prov,
  p.tel_prov, p.calle_prov, p.no_ext, p.no_int, p.col_prov, p. loca_prov, p.mun_prov, p.genero,
  p.cp, g.estado as s, p.deleted_at FROM proveedores as p INNER JOIN estados as g ON p.id_es = g.id_es");

  // rutas para mandar a llamar la vista 1.-carpeta 2.-nombre de la vista
  return view ('proveedor.reporteprov')->with('proveedores',$jiovani);
}
else
{
  Session::flash('error', 'El usuario esta desactivado, favor de consultar a su administrador');
 return redirect()->route('login');
}
}

 // funcion para desactivar registros
public function eliminap($id_prov)
{
  if(Session::get('sesionidu')!="")
		{
 // echo "El proveedor a eliminar es $id_prov";
 proveedores::find($id_prov)->delete();
 $titulo = "Desactivar Proveedor";
 $mensaje1 = "El proveedor a sido desactivado correctamente";
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

public function restaurarp($id_prov)
    {
      if(Session::get('sesionidu')!="")
		{
      //echo "El proveedora eliminar es $id_prov";
      proveedores::withTrashed()->where('id_prov',$id_prov)->restore();
     // find($idm)->delete();
      $titulo = "Restaurar Proveedor";
      $mensaje1 = "El Proveedor a sido restaurado correctamente";
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

    public function modificap($id_prov)
    {
      if(Session::get('sesionidu')!="")
      {
     // echo "proveedor modificado $id_prov";
     $pro = proveedores::where('id_prov','=',$id_prov)->get();
     $id_es=$pro[0]->id_es;
     $estado = estados::where('id_es','=',$id_es)->get();
     $demas = estados::where('id_es','!=',$id_es)->get();


     return view('proveedor.modificaproveedor')
     // el cero es para que todos los datos de la consulta aparezcan
     ->with('proveedores',$pro[0])
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

    public function guardaedicionpro(Request $request)
    {
      if(Session::get('sesionidu')!="")
      {
      $id_prov = $request->id_prov;
      $nombre_prov = $request->nombre_prov;
      $apa_prov = $request->apa_prov;
      $ama_prov = $request->ama_prov;
      $correo_prov = $request->correo_prov;
      $tel_prov = $request->tel_prov;
      $genero = $request->genero;
      $calle_prov = $request->calle_prov;
      $no_ext = $request->no_ext;
      $no_int = $request->no_int;
      $col_prov = $request->col_prov;
      $loca_prov = $request->loca_prov;
      $mun_prov = $request->mun_prov;
      $cp = $request->cp;
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

        $pro = proveedores::find($id_prov);
        if ($file!="")
        {
          $pro->archivo=$img2;
        }

      // insertar datos
     // $pro = new proveedores;
    //  $cli -> archivo =$img2;
      $pro -> id_prov = $request->id_prov;
      $pro -> nombre_prov = $request->nombre_prov;
      $pro -> apa_prov = $request->apa_prov;
      $pro -> ama_prov = $request->ama_prov;
     // $pro -> archivo = $img2;
      $pro-> correo_prov = $request->correo_prov;
      $pro -> tel_prov = $request->tel_prov;
      $pro-> calle_prov = $request->calle_prov;
      $pro-> no_ext = $request->no_ext;
      $pro-> no_int = $request->no_int;
      $pro-> col_prov = $request->col_prov;
      $pro-> loca_prov = $request->loca_prov;
      $pro-> mun_prov = $request->mun_prov;
      $pro-> genero = $request->genero;
      $pro-> cp = $request -> cp;
      $pro-> id_es = $request -> id_es;
      $pro-> save();

      $titulo = "MODIFICACION DEL PROVEEDOR";
      $mensaje1 = "El Proveedor fue modificado correctamente";
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
