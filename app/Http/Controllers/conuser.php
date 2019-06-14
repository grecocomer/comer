<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\users;
use App\estados;

use Session; //libreria de sesiones


class conuser extends Controller
{
    public function login(){
      
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

    }

   

    public function validalogin(Request $request)
    {
        $user = $request->user;
        $pasw = $request->pasw;

        $this->validate($request,[
            'user'=>'required',
              'pasw'=>'required',
            ]);

        $consulta = users::withTrashed()
        ->where('nombre_user','=',$user)
        ->where('contrasena','=',$pasw)
        ->get();

        if(count($consulta)==0)
        {
           Session::flash('error', 'El usuario no existe o la contraseña no es correcta, intentalo de nuevo');
           
          
           $request->session()->flash('error', 'El usuario no existe o la contraseña no es correcta, intentalo de nuevo');

         // return redirect()->route('login');
          return redirect('principal');
        }
        else{
          if($consulta[0]->deleted_at !="")
          {
            Session::flash('error','El usuario esta desactivado. consulte a sua dministrador');
            return redirect()->route('login');
          }
          else{
              //$request->session()->put('sessionname',$consulta[0]->nombre);
              Session::put('sesionname',$consulta[0]->nombre_user);
              Session::put('sesionidu',$consulta[0]->id_user);
              Session::put('sesiontipo',$consulta[0]->tipo_user);

             /* $sname=Session::get('sesionname');
              $sidu=Session::get('sesionidu');
              $stipo=Session::get('sesiontipo');

              echo $sname.''.$sidu.''.$stipo; */

              return redirect()->route('principal');// vista de inicio de pagina web

          }
        } 

    }

    public function principal ()
    {
        if (Session::get('sesionidu')!="")
        {
            return view ('index');// vista principal index
        }
        else
        {
            Session::flash('error','Es neesario iniciar sesión');
            return redirect()->route('login');
        }
    }

    public function cerrarsesion()
    {
      Session::forget('sesionname');
      Session::forget('sesionidu');
      Session::forget('sesiontipo');
      Session::flush();
      Session::flash('error','Sesion cerrada correctamente');
      return redirect()->route('login');// el redirect sirve para llevar a una funcion dentro del controlador
    }


    public function altauser()
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
                                     ->with('id_user',$id_user);
      }

}
