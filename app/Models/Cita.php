<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Factura;

class Cita extends Model
{
    //

    protected $table = 'cita';

    protected $fillable = [
        'motivo',
        'status',
        'appointment_date',
        'start_time',
        'final_time',
        'cod_user',
        'cod_paciente',
        'cod_servicio',
    ];

    public function doctor()
    {
        return $this->belongsTo(User::class, 'cod_user');
    }
    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'cod_paciente');
    }
    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'cod_servicio');
    }

    protected static function booted()
    {
        static::creating(function ($cita) {
            if ($cita->start_time && $cita->servicio) {
                $cita->final_time = Carbon::parse($cita->start_time)
                    ->addMinutes($cita->servicio->time)
                    ->format('H:i');
            }
        });
    }

    public function factura()
    {
        return $this->hasOne(Factura::class, 'code_cita');
    }
}
