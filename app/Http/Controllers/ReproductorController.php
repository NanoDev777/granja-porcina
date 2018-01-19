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
      #$reproducers = Reproductores::join('genetica', 'reproductores.genetica_id','=', 'genetica.id')
                                  #->select('reproductores.*')
                                  #->get();
      $array = array();
      $data = array();
      $reproducers = Reproductores::orderBy('id', 'desc')->get();
      $data = array();
      foreach ($reproducers as $row) {
        $this->array_push_assoc($array, array('codigo'=>$row->codigo,'fecha'=>$row->fecha_nacimiento,'sexo'=>$row->sexo,'condicion'=>$row->condicion,'genetica'=>$row->genetica->nombre,'precio'=>$row->precio));
        array_push($data,$array);
      }
 
      return response()->json(['data' => $data]);
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

}
