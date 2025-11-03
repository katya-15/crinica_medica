<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Metodopago;

class Efectivo extends Model
{
    //
    protected $table = 'efectivo';

    protected $fillable = ['monto_recibido', 'metodopago_id'];

    public function metodoDePago()
    {
        return $this->belongsTo(Metodopago::class, 'metodopago_id');
    }
}
