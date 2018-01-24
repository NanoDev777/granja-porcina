<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Reproductores;

class ReproductorController extends Controller
{
	  public function array_push_assoc(array &$arrayDatos, array $values){
      $arrayDatos = array_merge($arrayDatos, $values);
    }

    public function index() {
      $array = array();
      $data = array();
      $reproducers = Reproductores::orderBy('id', 'desc')->get();
      foreach ($reproducers as $row) {
        $this->array_push_assoc($array, array('codigo'=>$row->codigo,'fecha'=>$row->fecha_nacimiento,'sexo'=>$row->sexo,'condicion'=>$row->condicion,'genetica'=>$row->genetica->nombre,'precio'=>$row->precio));
        array_push($data,$array);
      }


      return datatables()->collection($data)->toJson();
    }

    public function store(Request $request) {
      $this->validate($request, [
        'codigo' => 'required',
        'origen' => 'required',
        'llegada' => 'required',
        'precio' => 'required',
        'nacimiento' => 'required',
        'peso' => 'required',
        'sexo' => 'required',
        //'condicion' => 'required',
        'genetica' => 'required',
        'ubicacion' => 'required',
        'observacion' => 'required'
      ]);

      $reproductor = Reproductores::create([
        'codigo' => $request->codigo,
        'origen' => $request->origen,
        'fecha_llegada' => $request->llegada,
        'precio' => $request->precio,
        'fecha_nacimiento' => $request->nacimiento,
        'peso' => $request->peso,
        'sexo' => $request->sexo,
        //'condicion' => $request->condicion,
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
