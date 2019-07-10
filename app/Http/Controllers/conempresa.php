<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Article;
use App\Http\Requests\ArticleRequest;

use App\empresas;
use Session; 

class conempresa extends Controller
{
    // empresas

    
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


public function altaempresa()
{
  if(Session::get('sesionidu')!="")
		{
$clavequesigue = empresas::withTrashed()->orderBy('id_empresa','desc')
->take(1)
->get();

if (count($clavequesigue)==0)
{
$id_em = 1;
}
else
{
$id_em= $clavequesigue[0]->id_empresa+1;
}



// DESPUES DE QUE VERIFICA TODOS LOS DATOS MANDA A LLAMAR A LA VISTA
return view ('empresas.altaempresa')->with('id_empresas',$id_em);
}
else
{
  Session::flash('error', 'El usuario esta desactivado, favor de consultar a su administrador');
 return redirect()->route('login');
}
}

public function guardaempresa(Request $request)
  {
    if(Session::get('sesionidu')!="")
		{

    //validaciones del formulario

    $this->validate($request,[
      'id_empresa'=>'required|numeric',
      'nombre_empresa'=>'required|regex:/^[\pL\s\-]+$/u',
      'tipo_empresa'=>'required|regex:/^[\pL\s\-]+$/u',
    ]);   

    // insertar datos
    $em = new empresas;
    $em -> id_empresa = $request->id_empresa;
    $em -> nombre_empresa = $request->nombre_empresa;
    $em -> tipo_empresa = $request->tipo_empresa;
    $em-> save();

    return redirect()->route('confirmacion');
  }
  else
  {
    Session::flash('error', 'El usuario esta desactivado, favor de consultar a su administrador');
   return redirect()->route('login');
  }

  }

  public function reporteempresa()
{
  if(Session::get('sesionidu')!="")
		{
//  $empresas = empresas::orderBy('nombre_empresa','asc')->get();
  // rutas para mandar a llamar la vista 1.-carpeta 2.-nombre de la vista
 // return view ('empresas.reporteempresa')->with('empresas',$empresas);

  $res=\DB::select("SELECT e.id_empresa, e.nombre_empresa, e.tipo_empresa,  e.deleted_at
 FROM empresas as e ");

//   rutas para mandar a llamar la vista 1.-carpeta 2.-nombre de la vista
return view ('empresas.reporteempresa')->with('empresas',$res);

/*
$articles = Article::oderBy('id_empresa','DESC')->paginate(5);
$articles->each(function($articles){
  $articles->nom_empresa;
  $articles->tipo_empresa;
});

return view ('empresas.reporteempresa')
->with('articles',$articles);
*/
}
else
{
  Session::flash('error', 'El usuario esta desactivado, favor de consultar a su administrador');
 return redirect()->route('login');
}
}

public function eliminaem($id_empresa)
{
  if(Session::get('sesionidu')!="")
		{

 // echo "El cliente a eliminar es $id";
 empresas::find($id_empresa)->delete();
 return redirect()->route('confirmacion');
}
else
{
  Session::flash('error', 'El usuario esta desactivado, favor de consultar a su administrador');
 return redirect()->route('login');
}
}

public function restaurarem($id_empresa)
    {
      if(Session::get('sesionidu')!="")
		{

      //echo "El maestro a eliminar es $idm";
      empresas::withTrashed()->where('id_empresa',$id_empresa)->restore();
     // find($idm)->delete();
     return redirect()->route('confirmacion');
    }
    else
    {
      Session::flash('error', 'El usuario esta desactivado, favor de consultar a su administrador');
     return redirect()->route('login');
    }
    }

    public function modificaem($id_empresa)
    {
      if(Session::get('sesionidu')!="")
		{
      $e = empresas::where('id_empresa','=',$id_empresa)->get();
      return view('empresas.modificaempresa')
     // el cero es para que todos los datos de la consulta aparezcan
     ->with('empresas',$e[0]);
    }
    else
    {
      Session::flash('error', 'El usuario esta desactivado, favor de consultar a su administrador');
     return redirect()->route('login');
    }
    }

    public function guardaedicionem(Request $request)
  {
    if(Session::get('sesionidu')!="")
		{
    $id_empresa = $request->id_empresa;
    $nombre_empresa = $request->nombre_empresa;
    $tipo_empresa = $request->tipo_empresa;
 

    //validaciones del formulario

    $this->validate($request,[
      'id_empresa'=>'required|numeric',
      'nombre_empresa'=>'required|regex:/^[\pL\s\-]+$/u',
      'tipo_empresa'=>'required|regex:/^[\pL\s\-]+$/u',
    ]);   

    // insertar datos
   // $em = new empresas;
    $em = empresas::find($id_empresa);
    $em -> id_empresa = $request->id_empresa;
    $em -> nombre_empresa = $request->nombre_empresa;
    $em -> tipo_empresa = $request->tipo_empresa;
    $em-> save();

    return redirect()->route('confirmacion');
  }
  else
  {
    Session::flash('error', 'El usuario esta desactivado, favor de consultar a su administrador');
   return redirect()->route('login');
  }

  }


}
