<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Reproductores;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ReproductorController extends Controller
{
	  public function array_push_assoc(array &$arrayDatos, array $values){
      $arrayDatos = array_merge($arrayDatos, $values);
    }

    public function index() {
      $reproducers = Reproductores::all();
      return datatables()->collection($reproducers)->toJson();
    }

    public function show($id) {
      try {
        $reproducers = Reproductores::findOrFail($id);
      } catch (ModelNotFoundException $e) {
          return response()->json(['error' => 'No se encontro el recurso'], 404);
      }
      return response()->json(['data' => $reproducers], 200);
    }

    public function store(Request $request) {


        $this->validate($request, [
        'codigo' => 'required',
        'origen' => 'required',
        'nacimiento' => 'required',
        'peso' => 'required',
        'sexo' => 'required',
        'genetica' => 'required',
        'ubicacion' => 'required',
      ]);

      $reproductor = Reproductores::create([
        'codigo' => $request->codigo,
        'origen' => $request->origen,
        'fecha_llegada' => $request->llegada,
        'precio' => $request->precio,
        'fecha_nacimiento' => $request->nacimiento,
        'peso' => $request->peso,
        'sexo' => $request->sexo,
        'condicion' => $request->condicion,
        'genetica_id' => $request->genetica,
        'ubicacion_id' => $request->ubicacion,
        'observacion' => $request->observacion
      ]);

      return response()->json(['data' => $reproductor, 'msg' => 'Reproductor agregado correctamente!']);
    }

    public function hembraInseminaciones() {
      $reproducers = Reproductores::join("inseminacion","reproductores.id","=","inseminacion.hembra_id")
                     ->where('reproductores.codigo','=',2)
                     ->select("inseminacion.fecha","inseminacion.hora")
                     ->get();
      return response()->json(['data' => $reproducers]);
    }

}
