<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="bg-base-200 p-3 rounded-full">
                    <i class="fa-solid fa-store text-xl text-secondary-content"></i>
                </div>
                <h1 class="text-2xl sm:text-3xl font-bold text-secondary-content">Gestión de servicio</h1>
            </div>
            <div class="flex flex-col sm:flex-row gap-2 sm:gap-3 w-full sm:w-auto">
                {{-- boton para creaer --}}
                <button class="btn btn-primary"
                    onclick="document.getElementById('create_servicio_modal').showModal()">
                    <i class="fa-solid fa-cash-register"></i> Crear servicio
                </button>
            </div>
        </div>
        {{-- modal para crear --}}
        <x-app-modal-create 
            modalId="create_servicio_modal" 
            title="Crear servicio" 
            formAction="{{ route('Servicio.store') }}"
            :form="view('servicio.servicio-form')->render()" />
        {{-- tabla para vista de admin --}}
        <x-app-table :tabs="[['label' => 'Activos'], ['label' => 'Inactivos']]">
            <x-slot name="tab_0">
                <thead class="text-center text-xs sm:text-sm">
                    <tr>
                        <th class="px-2 py-3 whitespace-nowrap">Nombre</th>
                        <th class="px-2 py-3 whitespace-nowrap">Descripcion</th>
                        <th class="px-2 py-3 whitespace-nowrap">Precio</th>
                        <th class="px-2 py-3 whitespace-nowrap">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($servicio as $item)
                        <tr class="text-center">
                            <td class="text-center">{{ $item->name }}</td>
                            <td class="text-center align-middle">
                                <div class="line-clamp-2 max-w-xs mx-auto">{{ $item->description }}</div>
                            </td>
                            <td class="text-center">Q. {{ $item->price }}</td>
                            <td class="flex flex-col items-center justify-center gap-2 w-full sm:flex-row sm:items-center sm:justify-center">
                                <div class="flex gap-2">
                                    <form action="{{ route('Servicio.deactivate', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-accent">
                                            <i class="fa-solid fa-trash"></i>
                                            Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        
                    @endforeach
                </tbody>
            </x-slot>
            <x-slot name="tab_1">
                <thead class="text-center text-xs sm:text-sm">
                    <tr>
                        <th class="px-2 py-3 whitespace-nowrap">Nombre</th>
                        <th class="px-2 py-3 whitespace-nowrap">Descripcion</th>
                        <th class="px-2 py-3 whitespace-nowrap">Precio</th>
                        <th class="px-2 py-3 whitespace-nowrap">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($servicio_inact as $item)
                        <tr class="text-center">
                            <td class="text-center">{{ $item->name }}</td>
                            <td class="text-center align-middle">
                                <div class="line-clamp-2 max-w-xs mx-auto">{{ $item->description }}</div>
                            </td>
                            <td class="text-center">Q. {{ $item->price }}</td>
                            <td class="flex flex-col items-center justify-center gap-2 w-full sm:flex-row sm:items-start sm:justify-start">
                                <div class="flex gap-2">
                                    <form action="{{ route('Servicio.restore', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-accent">
                                            <i class="fa-solid fa-trash-undo"></i>
                                            Restaurar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        
                    @endforeach
                </tbody>
            </x-slot>
        </x-app-table>
    </div>
</x-app-layout>
