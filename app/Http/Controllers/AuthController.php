<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Paciente;
use App\Models\Cita;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function show(Request $request)
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $valid = $request->validate([
            'username' => 'required|string',
            'password' => 'required',
        ]);
        $valid['username'] = strtolower($valid['username']);
        if (Auth::attempt($valid)) {
            $user = Auth::user();
            if ($user->status === '1') {
                return redirect(route('Auth.dashboard'))
                    ->with('success', 'Welcome back')
                    ->with(compact('user'));
            }
            Auth::logout();
            return redirect(route('login'))
                ->with('auth', 'Tu cuenta esta inactiva. Contacta al administrador...');
        }

        return redirect(route('login'))
            ->with(['auth' => 'Credenciales incorrectas. Intente de nuevo...']);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect(route('login'))
            ->with('success', 'Has cerrado sesión correctamente.');
    }

    public function dashboard()
    {
        $hoy = Carbon::today();
        $mesActual = Carbon::now()->month;
        $anioActual = Carbon::now()->year;

        // Pacientes
        $paciente = Paciente::where('status', '1')->count();
        $paciente_inact = Paciente::where('status', '2')->count();

        // Citas del mes actual
        $citas = Cita::where('status', '1')
            ->whereMonth('appointment_date', $mesActual)
            ->whereYear('appointment_date', $anioActual)
            ->count();

        $citas_fin = Cita::where('status', '2')
            ->whereMonth('appointment_date', $mesActual)
            ->whereYear('appointment_date', $anioActual)
            ->count();

        $totalCitasMes = $citas + $citas_fin;

        $porcentajeFinalizadas = $totalCitasMes > 0 ? round(($citas_fin / $totalCitasMes) * 100, 2) : 0;
        $porcentajePendientes = $totalCitasMes > 0 ? round(($citas / $totalCitasMes) * 100, 2) : 0;

        $citasPlanificadasHoy = Cita::whereDate('appointment_date', $hoy)->count();

        $citasPendientesHoy = Cita::where('status', '1')
            ->whereDate('appointment_date', $hoy)
            ->count();

        $citasCompletasHoy = Cita::where('status', '2')
            ->whereDate('appointment_date', $hoy)
            ->count();

        $fechaHoy = \Carbon\Carbon::now()->format('d/m/Y');


        return view('dashboard', compact(
            'paciente',
            'paciente_inact',
            'citas',
            'citas_fin',
            'porcentajeFinalizadas',
            'porcentajePendientes',
            'citasPlanificadasHoy',
            'citasPendientesHoy',
            'citasCompletasHoy',
            'fechaHoy',
        ));
    }
}
