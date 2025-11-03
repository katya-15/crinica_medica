<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Metodopago;

class Tarjeta extends Model
{
    //
    protected $table = 'tarjeta';

    protected $fillable = ['name_card', 'num_card', 'fecha_expiracion', 'metodopago_id'];

    public function metodoDePago()
    {
        return $this->belongsTo(Metodopago::class, 'metodopago_id');
    }
}
