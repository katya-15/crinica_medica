<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

    <!-- Seleccionar cita -->
    <div>
        <label for="code_cita" class="label">
            <span class="label-text font-medium">Seleccione una cita</span>
        </label>
        <select name="code_cita" id="code_cita" class="select select-bordered select-primary w-full" required>
            <option value="">Seleccione una cita</option>
            @foreach ($citas as $cita)
                <option 
                    value="{{ $cita->id }}" 
                    data-precio="{{ $cita->servicio->price }}"
                    data-servicio="{{ $cita->servicio->name }}"
                >
                    {{ $cita->paciente->name }} {{ $cita->paciente->last_name }} 
                    - {{ $cita->appointment_date }} 
                    ({{ $cita->servicio->name }})
                </option>
            @endforeach
        </select>
    </div>

    <!-- Total (con IVA) -->
    <div>
        <label for="total" class="label">
            <span class="label-text font-medium">Total (con IVA 12%)</span>
        </label>
        <input 
            type="number" 
            name="total" 
            id="total" 
            readonly
            step="0.01"
            class="input input-bordered input-primary w-full bg-gray-100 cursor-not-allowed" 
        />
        @error('total')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Método de pago -->
    <div>
        <label for="metodopago_id" class="label">
            <span class="label-text font-medium">Método de Pago</span>
        </label>
        <select name="metodopago_id" id="metodopago_id" class="select select-bordered select-primary w-full" required>
            <option value="" disabled selected>Seleccione un método de pago</option>
            @foreach ($metodos as $metodo)
                <option value="{{ $metodo->id }}">{{ ucfirst($metodo->tipo_pago) }}</option>
            @endforeach
        </select>
        @error('metodopago_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>

<!-- Campos dinámicos de método de pago -->
<div id="campos-dinamicos" class="mt-4"></div>

<!-- Script para autocompletar total e IVA -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const citaSelect = document.getElementById('code_cita');
        const totalInput = document.getElementById('total');
        const metodoSelect = document.getElementById('metodopago_id');
        const contenedor = document.getElementById('campos-dinamicos');

        // 🔹 Cuando cambia la cita, calcular el total con IVA
        citaSelect.addEventListener('change', function() {
            const selectedOption = citaSelect.options[citaSelect.selectedIndex];
            const precio = parseFloat(selectedOption.getAttribute('data-precio')) || 0;
            const totalConIva = precio + (precio * 0.12);
            totalInput.value = totalConIva.toFixed(2);
        });

        // 🔹 Mostrar campos según método de pago
        metodoSelect.addEventListener('change', function() {
            const seleccion = metodoSelect.options[metodoSelect.selectedIndex].text.toLowerCase();
            contenedor.innerHTML = '';

            if (seleccion === 'efectivo') {
                contenedor.innerHTML = `
                    <div>
                        <label class="label"><span class="label-text font-medium">Monto recibido</span></label>
                        <input type="number" name="monto_recibido" step="0.01"
                            class="input input-bordered input-primary w-full" required>
                    </div>`;
            } else if (seleccion === 'tarjeta') {
                contenedor.innerHTML = `
                    <div>
                        <label class="label"><span class="label-text font-medium">Nombre en la tarjeta</span></label>
                        <input type="text" name="name_card" class="input input-bordered input-primary w-full" required>
                    </div>
                    <div>
                        <label class="label"><span class="label-text font-medium">Número de tarjeta</span></label>
                        <input type="text" name="num_card" maxlength="20"
                            class="input input-bordered input-primary w-full" required>
                    </div>
                    <div>
                        <label class="label"><span class="label-text font-medium">Fecha de expiración</span></label>
                        <input type="date" name="fecha_expiracion"
                            class="input input-bordered input-primary w-full" required>
                    </div>`;
            } else if (seleccion === 'deposito') {
                contenedor.innerHTML = `
                    <div>
                        <label class="label"><span class="label-text font-medium">Número de referencia</span></label>
                        <input type="text" name="numero_referencia" class="input input-bordered input-primary w-full" required>
                    </div>
                    <div>
                        <label class="label"><span class="label-text font-medium">Fecha emitida</span></label>
                        <input type="date" name="fecha_emitida" class="input input-bordered input-primary w-full" required>
                    </div>
                    <div>
                        <label class="label"><span class="label-text font-medium">Cuenta destino</span></label>
                        <input type="text" name="cuenta_destino" class="input input-bordered input-primary w-full" required>
                    </div>`;
            }
        });
    });
</script>
