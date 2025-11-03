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
                    class="input input-bordered input-primary w-full" />
            </div>
            <div>
                <label for="appointment_date" class="label">
                    <span class="label-text font-medium">Fecha de cita</span>
                </label>
                <input type="date" name="appointment_date" id="appointment_date" required
                    class="input input-bordered input-primary w-full" />
            </div>

            <div>
                <label for="start_time" class="label">
                    <span class="label-text font-medium">Horario de la cita</span>
                </label>
                <input type="time" name="start_time" id="start_time"
                    class="input input-bordered input-primary w-full">
            </div>
            <div class="sm:col-span-2">
                <label for="cod_servicio" class="label">
                    <span class="label-text font-medium">Seleccione un servicio</span>
                </label>
                <select name="cod_servicio" id="cod_servicio" class="select select-bordered select-primary w-full"
                    required>
                    <option value="" disabled selected>Seleccione un servicio</option>
                    @foreach ($servisio as $serv)
                        <option value="{{ $serv->id }}">{{ $serv->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="sm:col-span-2">
                <label for="cod_user" class="label">
                    <span class="label-text font-medium">Seleccione un doctor</span>
                </label>
                <select name="cod_user" id="cod_user" class="select select-bordered select-primary w-full" required>
                    <option value="" disabled selected>Seleccione un doctor</option>
                    @foreach ($doctor as $doc)
                        <option value="{{ $doc->id }}">{{ $doc->name }} {{ $doc->last_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>
