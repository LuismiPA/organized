<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PagesController extends Controller
{
    //login
    public function login(){
        return view("auth.login");
    }
    //admin
    public function adminPage(){
        return view ("admin.panel");
    }
  /*   public function crear(){
        return view ("admin.crear");
    }

    //users
    public function crear_usuario(Request $request){
        $request->validate([
            "name" => "required",
            "email" => "required",
            "password" => "required",
            "password_confirmation" =>"required | same:password",
            "tipo" => "required"
        ]);
        
        $usuarioNuevo = new User();
        $usuarioNuevo->name = $request->name;
        $usuarioNuevo->email = $request->email;
        $usuarioNuevo->password = Hash::make($request->password);
        $usuarioNuevo->tipo = $request->tipo;
        $usuarioNuevo->save();
        redirect("/admin/panel");
        return back()->with("mensaje", "Usuario creado correctamente");
    }

    public function listadoUsuarios()
 listadoUsuarios()
  return view("admin.panel", compact("usuarios"));
    } */
}