<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Metodopago;

class Deposito extends Model
{
    //
    
    protected $table = 'deposito';

    protected $fillable = ['numero_referencia', 'fecha_emitida', 'cuenta_destino', 'metodopago_id'];

    public function metodoDePago()
    {
        return $this->belongsTo(Metodopago::class, 'metodopago_id');
    }
}
