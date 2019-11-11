<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class PagesController extends Controller
{
    //function inicio
    public function inicio(){
        $admins = App\Administrador::all();
        return view('welcome',compact('admins'));
    }
    //function inicio
    public function cuestionarios(){
        return view('cuestionarios.cuestionarios');
    }

    //function inicio
    public function admins(){
        return view('admins.admins');
    }
    //function inicio
    public function jugadores(){
        return view('jugadores.jugadores');
    }
    //function inicio
    public function otros(){
          return view('otros.otros');
    }

    //crear en bd $admins
    public function crear(Request $request){
          $adminNuevo = new App\Administrador;
          $adminNuevo->user = $request->user;
          $adminNuevo->nombre = $request->nombre;
          $adminNuevo->password = $request->password;

          $adminNuevo->save();

          return back()->with('mensaje', 'Nota Agregada'); //retornando a la misma pagina
          //return $request->all(); //verifica que las respuestas se estan enviando
    }

}
