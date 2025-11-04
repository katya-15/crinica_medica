<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="bg-base-200 p-3 rounded-full">
                    <i class="fa-solid fa-users text-xl text-secondary-content"></i>
                </div>
                <h1 class="text-2xl sm:text-3xl font-bold text-secondary-content">Gestión de usuarios</h1>
            </div>
            <div class="flex flex-col sm:flex-row gap-2 sm:gap-3 w-full sm:w-auto">
                {{-- boton para creaer --}}
                <button class="btn btn-primary"
                    onclick="document.getElementById('create_user_modal').showModal()">
                    <i class="fa-solid fa-user-plus"></i> Crear Usuario
                </button>
            </div>
        </div>
        {{-- modal para crear --}}
        <x-app-modal-create 
            modalId="create_user_modal" 
            title="Crear usuario" 
            formAction="{{ route('User.store') }}"
            :form="view('user.user-form')->render()" />
        {{-- tabla para vista de admin --}}
        <x-app-table :tabs="[['label' => 'Activos'], ['label' => 'Inactivos']]">
            <x-slot name="tab_0">
                <thead class="text-center text-xs sm:text-sm">
                    <tr>
                        <th class="px-2 py-3 whitespace-nowrap">Nombre</th>
                        <th class="px-2 py-3 whitespace-nowrap">Apellido</th>
                        <th class="px-2 py-3 whitespace-nowrap">Telefono</th>
                        <th class="px-2 py-3 whitespace-nowrap">DPI</th>
                        <th class="px-2 py-3 whitespace-nowrap">rol</th>
                        <th class="px-2 py-3 whitespace-nowrap">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $item)
                        <tr class="text-center">
                            <td class="text-center">{{ $item->name }}</td>
                            <td class="text-center">{{ $item->last_name }}</td>
                            <td class="text-center">{{ $item->phone }}</td>
                            <td class="text-center">{{ $item->dpi }}</td>
                            <td class="text-center">{{ $item->rol }}</td>
                            <td class="flex flex-col items-center justify-center gap-2 w-full sm:flex-row sm:items-start sm:justify-start">
                                <div class="flex gap-2">
                                    <form action="{{ route('User.deactivate', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-accent">
                                            <i class="fa-solid fa-trash"></i>
                                            Eliminar</button>
                                    </form>
                                </div>
                                @if ($item->rol === 'medico')
                                    <div class="flex gap-2">
                                        <button class="btn btn-secondary btn-sm"
                                            onclick="document.getElementById('create_especialidad_modal_{{ $item->id }}').showModal()">
                                            agregar especialidad
                                        </button>
                                        <x-app-modal-create 
                                            modalId="create_especialidad_modal_{{ $item->id }}" 
                                            title="Crear especialidad" 
                                            formAction="{{ route('User.specialty', $item->id ) }}"
                                            :form="view('user.expecialiti-form', ['user' => $item])->render()" />
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </x-slot>
            <x-slot name="tab_1">
                <thead class="text-center text-xs sm:text-sm">
                    <tr>
                        <th class="px-2 py-3 whitespace-nowrap">Nombre</th>
                        <th class="px-2 py-3 whitespace-nowrap">Apellido</th>
                        <th class="px-2 py-3 whitespace-nowrap">Telefono</th>
                        <th class="px-2 py-3 whitespace-nowrap">DPI</th>
                        <th class="px-2 py-3 whitespace-nowrap">rol</th>
                        <th class="px-2 py-3 whitespace-nowrap">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user_inact as $item)
                        <tr class="text-center">
                            <td class="text-center">{{ $item->name }}</td>
                            <td class="text-center">{{ $item->last_name }}</td>
                            <td class="text-center">{{ $item->phone }}</td>
                            <td class="text-center">{{ $item->dpi }}</td>
                            <td class="text-center">{{ $item->rol }}</td>
                            <td class="flex flex-col items-center justify-center gap-2 w-full sm:flex-row sm:items-start sm:justify-start">
                                <div class="flex gap-2">
                                    <form action="{{ route('User.restore', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-accent">
                                            <i class="fa-solid fa-trash-undo"></i>
                                            Eliminar</button>
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
