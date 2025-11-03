<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cita;

class Servicio extends Model
{
    
    protected $table = 'servicio';

    protected $fillable = [
        'name',
        'description',
        'price',
        'status',
        'time',
    ];

    public function cita(){
        return $this->hasMany(Cita::class, 'cod_servicio');
    }
}
