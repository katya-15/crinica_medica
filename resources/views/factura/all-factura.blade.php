<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="bg-base-200 p-3 rounded-full">
                    <i class="fa-solid fa-users text-xl text-secondary-content"></i>
                </div>
                <h1 class="text-2xl sm:text-3xl font-bold text-secondary-content">Gestión administrativa</h1>
            </div>
            <div class="flex flex-col sm:flex-row gap-2 sm:gap-3 w-full sm:w-auto">
                {{-- boton para creaer --}}
                <button class="btn btn-primary" onclick="document.getElementById('create_factura_modal').showModal()">
                    <i class="fa-solid fa-user-plus"></i> Crear factura
                </button>
            </div>
        </div>
        {{-- modal para crear --}}
        <x-app-modal-create modalId="create_factura_modal" title="Crear factura"
            formAction="{{ route('Factura.store') }}" :form="view('factura.factura-form', ['metodos' => $metodos, 'citas' => $citas])->render()" />
        {{-- tabla para vista de admin --}}
        <x-app-table :tabs="[['label' => 'Activos']]">
            <x-slot name="tab_0">
                <thead class="text-center text-xs sm:text-sm">
                    <tr>
                        <th class="px-2 py-3 whitespace-nowrap">Id</th>
                        <th class="px-2 py-3 whitespace-nowrap">Total (Q)</th>
                        <th class="px-2 py-3 whitespace-nowrap">Método de Pago</th>
                        <th class="px-2 py-3 whitespace-nowrap">Detalles</th>
                        <th class="px-2 py-3 whitespace-nowrap">Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($facturas as $item)
                        <tr>
                            <td class="text-center">{{ $item->id }}</td>
                            <td class="text-center">Q{{ number_format($item->total, 2) }}</td>
                            <td class="text-center">{{ ucfirst($item->metodoDePago->tipo_pago) }}</td>
                            <!-- 🔹 Mostrar detalles según el método -->
                            <td class="text-center">
                                @switch($item->metodoDePago->tipo_pago)
                                    @case('efectivo')
                                        @php
                                            $efectivo = \App\Models\Efectivo::where(
                                                'metodopago_id',
                                                $item->metodopago_id,
                                            )->first();
                                        @endphp
                                        @if ($efectivo)
                                            <span>Monto recibido: Q{{ number_format($efectivo->monto_recibido, 2) }}</span>
                                        @else
                                            <span class="text-gray-400">Sin datos</span>
                                        @endif
                                    @break

                                    @case('tarjeta')
                                        @php
                                            $tarjeta = \App\Models\Tarjeta::where(
                                                'metodopago_id',
                                                $item->metodopago_id,
                                            )->first();
                                        @endphp
                                        @if ($tarjeta)
                                            <span>Tarjeta: {{ $tarjeta->name_card }}<br>Número: {{ $tarjeta->num_card }}</span>
                                        @else
                                            <span class="text-gray-400">Sin datos</span>
                                        @endif
                                    @break

                                    @case('deposito')
                                        @php
                                            $deposito = \App\Models\Deposito::where(
                                                'metodopago_id',
                                                $item->metodopago_id,
                                            )->first();
                                        @endphp
                                        @if ($deposito)
                                            <span>Ref: {{ $deposito->numero_referencia }}<br>Cuenta:
                                                {{ $deposito->cuenta_destino }}</span>
                                        @else
                                            <span class="text-gray-400">Sin datos</span>
                                        @endif
                                    @break

                                    @default
                                        <span class="text-gray-400">Sin detalles</span>
                                @endswitch
                            </td>

                            <td class="text-center">{{ $item->created_at->format('d/m/Y') }}</td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-gray-500 py-4">No hay facturas registradas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </x-slot>
            </x-app-table>

        </div>
    </x-app-layout>
