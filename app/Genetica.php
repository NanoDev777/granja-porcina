<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genetica extends Model
{ 
	protected $table = 'genetica';
	protected $fillable = [
      'nombre', 'descripcion'
    ];

	public function reproductores() {
      return $this->hasMany(Reproductores::class);
    }
}
