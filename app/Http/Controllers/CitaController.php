<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use Carbon\Carbon;
use App\Models\Servicio;
use App\Models\User;
use App\Models\Paciente;

class CitaController extends Controller
{
    public function show(){
        $medicos = User::where('status', '1')->where('rol', 'medico')->get();
        $citas = Cita::where('status', '1')
            ->with(['doctor', 'paciente', 'servicio'])
            ->get()
            ->map(function ($cita) {
                return [
                    'id'          => $cita->id,
                    'motivo'      => $cita->motivo,
                    'fecha'       => $cita->appointment_date . 'T' . $cita->start_time,
                    'hora_inicio' => $cita->start_time,
                    'hora_fin'    => $cita->final_time,
                    'paciente'    => $cita->paciente->name ?? 'Sin nombre',
                    'servicio'    => $cita->servicio->name ?? '',
                    'doctor'      => $cita->doctor->name ?? 'Sin asignar',
                    'status'      => $cita->status,
                    'cod_user'    => $cita->cod_user,
                ];
            });

        
        return view('cita.all-cita', compact('medicos', 'citas'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'motivo'  => 'required|string',
            'appointment_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'cod_user' => 'required|exists:users,id',
            'cod_paciente' => 'required|exists:paciente,id',
            'cod_servicio' => 'required|exists:servicio,id',
        ]);
        
        $servicio = Servicio::findOrFail($request->cod_servicio);
        $start = Carbon::parse($request->start_time);
        $end = $start->copy()->addMinutes($servicio->time)->format('H:i');

        $traslape = Cita::where('cod_user', $request->cod_user)
            ->where('appointment_date', $request->appointment_date)
            ->where(function ($query) use ($start, $end) {
                $query->where('start_time', '<', $end)
                    ->where('final_time', '>', $start->format('H:i'));
            })
            ->exists();
        if ($traslape) {
            return back()->with('error', 'El médico ya tiene una cita dentro de ese horario.')->withInput();
        }

        $date = $request->only([
            'motivo',
            'appointment_date',
            'start_time',
            'cod_user',
            'cod_paciente',
            'cod_servicio',
        ]);

        $date['status'] = '1';


        Cita::create($date);

        return redirect(route('Paciente.show'))->with('success', 'Cita creado con exito');
    }
}
