<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="bg-base-200 p-3 rounded-full">
                    <i class="fa-solid fa-hospital-user text-xl text-secondary-content"></i>
                </div>
                <h1 class="text-2xl sm:text-3xl font-bold text-secondary-content">Gestión de paciente</h1>
            </div>
            <div class="flex flex-col sm:flex-row gap-2 sm:gap-3 w-full sm:w-auto">
                {{-- boton para creaer --}}
                <button class="btn btn-primary"
                    onclick="document.getElementById('create_paciente_modal').showModal()">
                    <i class="fa-solid fa-file-medical"></i> Crear Paciente
                </button>
            </div>
        </div>
        {{-- modal para crear --}}
        <x-app-modal-create 
            modalId="create_paciente_modal" 
            title="Crear paciente" 
            formAction="{{ route('Paciente.store') }}"
            :form="view('paciente.paciente-form')->render()" />
        {{-- tabla para vista de admin --}}
        <x-app-table :tabs="[['label' => 'Activos'], ['label' => 'Inactivos']]">
            <x-slot name="tab_0">
                <thead class="text-center text-xs sm:text-sm">
                    <tr>
                        <th class="px-2 py-3 whitespace-nowrap">Nombre</th>
                        <th class="px-2 py-3 whitespace-nowrap">Apellido</th>
                        <th class="px-2 py-3 whitespace-nowrap">Edad</th>
                        <th class="px-2 py-3 whitespace-nowrap">Peso</th>
                        <th class="px-2 py-3 whitespace-nowrap">Altura</th>
                        <th class="px-2 py-3 whitespace-nowrap">Tipo de sangre</th>
                        <th class="px-2 py-3 whitespace-nowrap">Fecha de ingreso</th>
                        <th class="px-2 py-3 whitespace-nowrap">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paciente as $item)
                        <tr class="text-center">

                            <td class="text-center">{{ $item->name }}</td>
                            <td class="text-center">{{ $item->last_name }}</td>
                            <td class="text-center">{{ $item->age }}</td>
                            <td class="text-center">{{ $item->weight }}</td>
                            <td class="text-center">{{ $item->height }}</td>
                            <td class="text-center">{{ $item->type_blood }}</td>
                            <td class="text-center">{{ $item->entrydate->format('d/m/Y') }}</td>
                            <td class="flex flex-col items-center justify-center gap-2 w-full sm:flex-row sm:items-center sm:justify-center">
                                <div class="flex gap-2">
                                    <button class="btn btn-secondary btn-sm"
                                        onclick="document.getElementById('create_emergencia_modal_{{ $item->id }}').showModal()">
                                        Cont. Emergencia 
                                    </button>
                                    <x-app-modal-create 
                                        modalId="create_emergencia_modal_{{ $item->id }}" 
                                        title="Crear contacto de emergencia" 
                                        formAction="{{ route('Paciente.emergency', $item->id ) }}"
                                        :form="view('paciente.emergency-form', ['paciente' => $item])->render()" />
                                </div>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </x-slot>
            <x-slot name="tab_1">
                muu bien
            </x-slot>

        </x-app-table>

    </div>
</x-app-layout>
