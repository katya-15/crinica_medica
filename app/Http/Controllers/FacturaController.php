<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;
use App\Models\Metodopago;
use App\Models\Efectivo;
use App\Models\Tarjeta;
use App\Models\Deposito;
use App\Models\Cita;

class FacturaController extends Controller
{
    public function show()
    {
        $facturas = Factura::with('metodoDePago')->orderBy('created_at', 'desc')->get();
        $metodos = Metodopago::all();
        $citas = Cita::where('status', '1')->orderBy('created_at', 'desc')->get();
        return view('factura.all-factura', compact('facturas', 'metodos', 'citas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'metodopago_id' => 'required|exists:metodopago,id',
            'code_cita' => 'required|exists:cita,id',
        ]);

        // 🔹 Obtener la cita junto con el servicio
        $cita = Cita::with('servicio')->findOrFail($request->code_cita);

        // 🔹 Calcular el total = precio del servicio + IVA (12%)
        $precioServicio = $cita->servicio->price;
        $iva = $precioServicio * 0.12;
        $total = $precioServicio + $iva;

        // 🔹 Crear la factura
        $factura = Factura::create([
            'total' => $total,
            'metodopago_id' => $request->metodopago_id,
            'code_cita' => $request->code_cita,
        ]);

        // 🔥 Cambiar el estado de la cita a “2” (cancelada)
        $cita->update(['status' => '2']);

        // 🔹 Obtener el tipo de método de pago
        $metodo = $factura->metodoDePago->tipo_pago;

        switch ($metodo) {
            case 'efectivo':
                $request->validate(['monto_recibido' => 'required|numeric|min:0']);
                Efectivo::create([
                    'monto_recibido' => $request->monto_recibido,
                    'metodopago_id' => $request->metodopago_id,
                ]);
                break;

            case 'tarjeta':
                $request->validate([
                    'name_card' => 'required|string|max:100',
                    'num_card' => 'required|string|max:20',
                    'fecha_expiracion' => 'required|date',
                ]);
                Tarjeta::create([
                    'name_card' => $request->name_card,
                    'num_card' => $request->num_card,
                    'fecha_expiracion' => $request->fecha_expiracion,
                    'metodopago_id' => $request->metodopago_id,
                ]);
                break;

            case 'deposito':
                $request->validate([
                    'numero_referencia' => 'required|string|unique:deposito,numero_referencia',
                    'fecha_emitida' => 'required|date',
                    'cuenta_destino' => 'required|string|max:100',
                ]);
                Deposito::create([
                    'numero_referencia' => $request->numero_referencia,
                    'fecha_emitida' => $request->fecha_emitida,
                    'cuenta_destino' => $request->cuenta_destino,
                    'metodopago_id' => $request->metodopago_id,
                ]);
                break;
        }

        return redirect()->route('Factura.show')->with('success', 'Factura creada correctamente con IVA y cita cancelada.');
    }
}
