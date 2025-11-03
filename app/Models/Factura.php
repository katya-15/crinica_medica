<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Metodopago;


class Factura extends Model
{
    //
    protected $table = 'factura';

    protected $fillable = ['total', 'metodopago_id', 'code_cita'];

    public function metodoDePago()
    {
        return $this->belongsTo(Metodopago::class, 'metodopago_id');
    }

    public function cita()
    {
        return $this->belongsTo(Cita::class, 'code_cita');
    }

    protected static function booted()
    {
        static::created(function ($factura) {
            if ($factura->cita) {
                $factura->cita->update(['status' => '2']); // 2 = cancelada
            }
        });
    }
}
