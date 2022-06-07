<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Limpiezas;
use Illuminate\Http\Request;

class LimpiezasApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Limpiezas::all();
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return Limpiezas::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function trabajos($id_trabajador){
        return Limpiezas::where('worker_id', $id_trabajador)->orderBy('horario', 'asc')->get();
     }

    public function pendiente()
    {
        return Limpiezas::where('estado', 'pendiente')->orderBy('horario', 'asc')->get();
    }

    public function planificado()
    {
        return Limpiezas::where('estado', 'planificada')->orderBy('horario', 'asc')->get();
    }

    public function acabado()
    {
        return Limpiezas::where('estado', 'acabada')->orderBy('horario', 'asc')->get();
    }

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
