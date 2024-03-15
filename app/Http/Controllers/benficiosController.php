<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\beneficios2;
use Carbon\Carbon;

class benficiosController extends Controller
{
    public function guardarBeneficios(Request $request){
        //  return view('welcome');
        //Log::info(json_encode($request->all()));
        $newBeneficio = new beneficios2;
        $newBeneficio->nombre = $request->nombre;
        $newBeneficio->fecha = Carbon::now();
        $newBeneficio->save();
        return response()->json(['message' => 'Beneficio guardado con exito'], 200);
    }

    public function modificarBeneficios($id,$nombre){
        $newBeneficio =  beneficios2::find($id);
        $newBeneficio->nombre = $nombre;
        $newBeneficio->fecha = Carbon::now();
        $newBeneficio->save();
        return response()->json(['message' => 'Beneficio modificado con exito'], 200);
    }

    public function mostrarBeneficios(){
        return beneficios2::all();
    }

    public function mostrarBeneficiosNombre($nombre){
        return beneficios2::where('nombre',$nombre)->get();
    }                             //columna,valor a buscar, es un select * from beneficios2 where nombre = $nombre

    public function redireccionar(){
        return redirect('/');
    }

    public function buscarBeneficior($id){
        // return response()->json(['message' => 'Beneficio guardado con exito'], 200);
        $beneficio = beneficios2::find($id);
        return $beneficio;
    }

    public function pruebaCarbon(){
        Carbon::setLocale('es');

        $fecha = Carbon::createFromFormat('d/m/Y', '02/04/2024');
        $nombreMes = $fecha->monthName;

        return response()->json(['mes' => $nombreMes], 200);
    }

    


    
}
