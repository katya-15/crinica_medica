<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Paciente extends Model
{

    protected $table = 'paciente';

    protected $fillable = [
        'name',
        'last_name',
        'address',
        'phone',
        'email',
        'dpi',
        'birthdate',
        'type_blood',
        'allergies',
        'chronic_diseases',
        'weight',
        'height',
        'entrydate',
        'status',
    ];

    protected $casts = [
        'birthdate' => 'date',
        'entrydate' => 'date',
        'weight' => 'decimal:2',
        'height' => 'decimal:2',
    ];

    //calcular la eddad
    protected $appends = ['age'];

    public function getAgeAttribute()
    {
        return $this->birthdate ? Carbon::parse($this->birthdate)->age : null;
    }
}
