<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    
    protected $table = 'servicio';

    protected $fillable = [
        'name',
        'description',
        'price',
        'status',
    ];

    // public function emergencias()
    // {
    //     return $this->hasMany(Emergencia::class, 'cod_paciente');
    // }
}
