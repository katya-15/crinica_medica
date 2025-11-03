<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Metodopago extends Model
{
    protected $table = 'metodopago';

    protected $fillable = [
        'tipo_pago',
    ];
    public function efectivo()
    {
        return $this->hasOne(Efectivo::class, 'metodopago_id');
    }

    public function deposito()
    {
        return $this->hasOne(Deposito::class, 'metodopago_id');
    }

    public function tarjeta()
    {
        return $this->hasOne(Tarjeta::class, 'metodopago_id');
    }

    public function factura()
    {
        return $this->hasMany(Factura::class, 'metodopago_id');
    }
}
