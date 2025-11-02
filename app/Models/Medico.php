<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    protected $table = 'medico';

    protected $fillable = [
        //especialidad
        'specialty',
        //numeor de colegiado
        'collegiate_num',
        //experiencia
        'experience',
        //fecha de contratación 
        'date_hire',
        //usuaio 
        'cod_user',
    ];

    //indica que es perteneciente de la tabla
    public function user()
    {
        return $this->belongsTo(User::class, 'cod_user');
    }
}
