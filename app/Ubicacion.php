<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
	protected $table = 'ubicacion';
	protected $fillable = [
      'nave', 'sala'
    ];

    public function fase() {
      return $this->belongsTo(Fase::class);
    }

    public function reproductores() {
      return $this->hasMany(Reproductores::class);
    }
}
