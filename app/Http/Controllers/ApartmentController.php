<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    //
    public function crear_apartamento(Request $request){
        $request->validate([
            "direccion" => "required",
            "codigo_postal" => "required",
            "habitaciones" => "required",
            "camas_dobles" => "required",
            "camas_indiv" => "required",
            "aseos" =>"required",
            "solarium" => "required",
            "propietario_id" => "required",
        ]);

        $apartment = new Apartment();
        $apartment->direccion = $request->direccion;
        $apartment->codigo_postal = $request->codigo_postal;
        $apartment->habitaciones = $request->habitaciones;
        $apartment->camas_indiv = $request->camas_indiv;
        $apartment->aseos = $request->aseos;
        $apartment->solarium = $request->solarium;
        $apartment->propietario_id = $request->propietario_id;
        $apartment->save();
        
       /*  return view("admin.panel"); */
    }
    public function editar_apartamento(Request $request,$id){
        try {
            //code...
            $apartment = Apartment::findOrFail($id);
            $apartment->direccion = $request->direccion;
            $apartment->codigo_postal = $request->codigo_postal;
            $apartment->habitaciones = $request->habitaciones;
            $apartment->camas_indiv = $request->camas_indiv;
            $apartment->aseos = $request->aseos;
            $apartment->solarium = $request->solarium;
            if($request->propietario_id){
                $apartment->propietario_id = $request->propietario_id;
            }
            $apartment->save();
        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function borrar_apartamento($id){
        $apartamento = Apartment::findOrFail($id)->delete();
    }
}
