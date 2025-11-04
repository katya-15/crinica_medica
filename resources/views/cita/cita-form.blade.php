<!-- Mensajes Toastr - Solo incluir estas librerías si no están ya en tu layout principal -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<div class="card w-full max-w-2xl mx-auto mt-6">
    <div class="card-body">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <input type="hidden" name="cod_paciente" value="{{ $paciente->id ?? '' }}">
            <div class="mb-4">
                <label for="specialty" class="label">
                    <span class="label-text font-medium">Paciente</span>
                </label>
                <input type="text" class="input input-bordered input-neutral w-full"
                    value="{{ $paciente->name }} {{ $paciente->last_name }}" disabled>
            </div>
            <div>
                <label for="motivo" class="label">
                    <span class="label-text font-medium">Motivo de la cita</span>
                </label>
                <input type="text" name="motivo" id="motivo" required
                    class="input input-bordered input-primary w-full" 
                    value="{{ old('motivo') }}"/>
                @error('motivo')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="appointment_date" class="label">
                    <span class="label-text font-medium">Fecha de cita</span>
                </label>
                <input type="date" name="appointment_date" id="appointment_date" required
                    class="input input-bordered input-primary w-full" 
                    value="{{ old('appointment_date') }}"/>
                @error('appointment_date')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="start_time" class="label">
                    <span class="label-text font-medium">Horario de la cita</span>
                </label>
                <input type="time" name="start_time" id="start_time"
                    class="input input-bordered input-primary w-full"
                    value="{{ old('start_time') }}">
                @error('start_time')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="sm:col-span-2">
                <label for="cod_servicio" class="label">
                    <span class="label-text font-medium">Seleccione un servicio</span>
                </label>
                <select name="cod_servicio" id="cod_servicio" class="select select-bordered select-primary w-full"
                    required>
                    <option value="" disabled selected>Seleccione un servicio</option>
                    @foreach ($servisio as $serv)
                        <option value="{{ $serv->id }}" {{ old('cod_servicio') == $serv->id ? 'selected' : '' }}>
                            {{ $serv->name }}
                        </option>
                    @endforeach
                </select>
                @error('cod_servicio')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="sm:col-span-2">
                <label for="cod_user" class="label">
                    <span class="label-text font-medium">Seleccione un doctor</span>
                </label>
                <select name="cod_user" id="cod_user" class="select select-bordered select-primary w-full" required>
                    <option value="" disabled selected>Seleccione un doctor</option>
                    @foreach ($doctor as $doc)
                        <option value="{{ $doc->id }}" {{ old('cod_user') == $doc->id ? 'selected' : '' }}>
                            {{ $doc->name }} {{ $doc->last_name }}
                        </option>
                    @endforeach
                </select>
                @error('cod_user')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
</div>

<script>
    // Configuración de Toastr (solo si no está configurado globalmente)
    if (typeof toastr !== 'undefined') {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
    }

    // Mostrar mensajes Toastr si existen en la sesión
    @if (session('success'))
        if (typeof toastr !== 'undefined') {
            toastr.success("{{ session('success') }}");
        } else {
            alert("{{ session('success') }}");
        }
        // Cerrar modal después de éxito (si es necesario)
        setTimeout(() => {
            if (typeof cerrarModal === 'function') {
                cerrarModal();
            }
            // O recargar la página
            window.location.reload();
        }, 2000);
    @endif

    @if (session('error'))
        if (typeof toastr !== 'undefined') {
            toastr.error("{{ session('error') }}");
        } else {
            alert("{{ session('error') }}");
        }
    @endif

    // Validación de fecha (sábados y domingos)
    const inputDate = document.getElementById('appointment_date');

    inputDate.addEventListener('input', function() {
        const selectedDate = new Date(this.value + 'T00:00');
        const day = selectedDate.getDay(); // 0 = domingo, 6 = sábado

        if (day === 0 || day === 6) {
            const mensaje = '⚠️ La clínica no atiende fines de semana. Por favor selecciona un día de lunes a viernes.';
            if (typeof toastr !== 'undefined') {
                toastr.warning(mensaje);
            } else {
                alert(mensaje);
            }
            this.value = '';
        }
    });

    // Evitar seleccionar fechas pasadas
    const today = new Date().toISOString().split('T')[0];
    inputDate.setAttribute('min', today);

    // Función para cerrar modal (debes implementarla según tu modal)
    function cerrarModal() {
        // Depende de cómo manejes tu modal
        // Ejemplo para DaisyUI modal:
        const modal = document.getElementById('modal-cita');
        if (modal) {
            modal.close();
        }
        // O si usas Alpine.js:
        // document.dispatchEvent(new CustomEvent('cerrar-modal'));
    }
</script>