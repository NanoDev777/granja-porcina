<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reproductores extends Model
{ 
	protected $fillable = [
      'codigo', 'origen', 'fecha_llegada', 'precio', 'peso', 'fecha_nacimiento', 'sexo', 'condicion', 'observacion', 'genetica_id', 'ubicacion_id'
    ];

    public function genetica() {
      return $this->belongsTo(Genetica::class);
    }

    public function ubicacion() {
      return $this->belongsTo(Ubicacion::class);
    }

    public function inseminacion() {
      return $this->belongsTo(Inseminacion::class);
    }
}
