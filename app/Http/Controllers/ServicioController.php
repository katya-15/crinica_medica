<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;

class ServicioController extends Controller
{
    public function show()
    {
        $servicio = Servicio::where('status', '1')->orderBY('created_at', 'desc')->get();
        $servicio_inact = Servicio::where('status', '2')->orderBY('created_at', 'desc')->get();

        return view('servicio.all-servicio', compact('servicio', 'servicio_inact'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric|min:200|max:800000',
            'time' => 'required|numeric',
        ]);
        $date = $request->only([
            'name',
            'description',
            'price',
            'time',

        ]);
        $date['status'] = '1';
        Servicio::Create($date);
        return redirect()->route('Servicio.show')->with('success', 'servicio creado con éxito');
    }

    public function deactivate(Servicio $servicio){
        $servicio->status = '2';
        $servicio->save();
        return redirect(route('Servicio.show'))->with('success', 'Usuario eliminado');
    }
    public function restore(Servicio $servicio){
        $servicio->status = '1';
        $servicio->save();
        return redirect(route('Servicio.show'))->with('success', 'Usuario restaurado');
    }
}
