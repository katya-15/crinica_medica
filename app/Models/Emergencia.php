<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Paciente;

class Emergencia extends Model
{
    
    protected $table = 'emergencia';

    protected $fillable = [
            'name',
            'last_name',
            'relationship',
            'phone',
            'address',
            'cod_paciente',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'cod_paciente');
    }
}
