<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inseminacion extends Model
{
    protected $fillable = [
      'fecha', 'hora', 'dosis', 'observacion', 'hembra_id', 'semen_id'
    ];

	public function reproductores() {
      return $this->hasMany(Reproductores::class);
    }
}
