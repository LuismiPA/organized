<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    //users

    public function crear()
    {
        return view("admin.crear");
    }

    public function crear_usuario(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required",
            "password" => "required",
            "password_confirmation" => "required | same:password",
            "tipo" => "required"
        ]);

        $usuarioNuevo = new User();
        $usuarioNuevo->name = $request->name;
        $usuarioNuevo->email = $request->email;
        $usuarioNuevo->password = Hash::make($request->password);
        $usuarioNuevo->tipo = $request->tipo;
        $usuarioNuevo->save();
        redirect("/admin/panel");
        /*  return back()->with("mensaje", "Usuario creado correctamente"); */
    }
    public function editar($id)
    {
        $usuario = User::where('id', $id)->get();
        return view("admin.editar")->with('usuario',$usuario);
    }

    public function editado(Request $request, $id)
    {
        $request->validate([
            "name" => "required",
            "email" => "required",
            "password" => "required",
            "password_confirmation" => "required | same:password",
            "tipo" => "required"
        ]);

        $usuario = User::where('id', $id);
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->tipo = $request->tipo;
        $usuario->save();
    }
}
