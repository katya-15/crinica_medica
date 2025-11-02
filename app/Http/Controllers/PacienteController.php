<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Emergencia;


class PacienteController extends Controller
{
    public function show()
    {
        $paciente = Paciente::where('status', '1')->orderBY('created_at', 'desc')->get();
        $paciente_inact = Paciente::where('status', '2')->orderBY('created_at', 'desc')->get();
        return view('paciente.all-paciente', compact('paciente', 'paciente_inact'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'address' => 'required|string|max:500',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|unique:paciente,email|max:255',
            'dpi' => 'required|string|max:13',

            'birthdate' => 'required|date|before:today',
            'type_blood' => 'required|string|max:10',
            'allergies' => 'nullable|string|max:1000',
            'chronic_diseases' => 'nullable|string|max:1000',
            'weight' => 'required|numeric|min:1|max:500',
            'height' => 'required|numeric|min:0.5|max:300',
            'entrydate' => 'required|date',
        ]);

        try {
            $data = $request->only([
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
            ]);

            $data['status'] = '1';

            Paciente::create($data);

            return redirect()->route('Paciente.show')->with('success', 'Paciente creado con éxito');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al crear el paciente: ' . $e->getMessage())->withInput();
        }
    }

    public function emergency(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'relationship' => 'required|string|max:15',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:500',
            'cod_paciente' => 'required|exists:paciente,id',
        ]);
        $date = $request->only([
            'name',
            'last_name',
            'relationship',
            'phone',
            'address',
            'cod_paciente',
        ]);
        Emergencia::create($date);
        return redirect(route('Paciente.show'))->with('success', 'Contacto de emergencia creado con exito');
    }
}
