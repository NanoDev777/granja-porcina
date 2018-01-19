<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fase extends Model
{
	protected $fillable = [
      'nombre', 'descripcion'
    ];
    
    public function ubicaciones() {
      return $this->hasMany(Ubicacion::class);
    }
}
