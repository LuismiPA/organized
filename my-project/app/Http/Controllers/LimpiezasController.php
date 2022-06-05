<?php

namespace App\Http\Controllers;

use App\Models\Limpiezas;
use Illuminate\Http\Request;

class LimpiezasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function limpiezaForm(){
        
        return view("admin.limpiezaForm");
    }

    public function crear_limpieza(Request $request)
    {
        /* $request->validate([
            "name" => "required",
            "email" => "required",
            "password" => "required",
            "password_confirmation" => "required | same:password",
            "tipo" => "required"
        ]); */

        $limpieza = new Limpiezas();
        $limpieza->apartment_id = $request->apartment_id;
        $limpieza->worker_id = $request->worker_id;
        $limpieza->estado = $request->estado;
        $limpieza->tipo_limpieza = $request->tipo;
        $limpieza->horario=$request->horario;
        $limpieza->save();
    }

    public function editar_limpieza(Request $request)
    {
        /* $request->validate([
            "name" => "required",
            "email" => "required",
            "password" => "required",
            "password_confirmation" => "required | same:password",
            "tipo" => "required"
        ]); */
        $limpieza = Limpiezas::findOrFail($request->id);
        $limpieza = new Limpiezas();
        $limpieza->apartment_id = $request->apartment_id;
        $limpieza->worker_id = $request->worker_id;
        $limpieza->estado = $request->estado;
        $limpieza->tipo_limpieza = $request->tipo;
        $limpieza->horario = $request->horario;
        $limpieza->save();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Limpiezas  $limpiezas
     * @return \Illuminate\Http\Response
     */
    public function show(Limpiezas $limpiezas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Limpiezas  $limpiezas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Limpiezas $limpiezas)
    {
        //
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Limpiezas  $limpiezas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Limpiezas $limpiezas)
    {
        //
    }
}
