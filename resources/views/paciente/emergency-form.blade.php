<div class="card w-full max-w-2xl mx-auto mt-6">
    <div class="card-body">
        <input type="hidden" name="cod_paciente" value="{{ $paciente->id ?? '' }}">
        <div class="mb-4">
            <label for="specialty" class="label">
                <span class="label-text font-medium">Paciente</span>
            </label>
            <input type="text" class="input input-bordered w-full"
                value="{{ $paciente->name }} {{ $paciente->last_name }}" disabled>
        </div>
        <div>
            <label for="name" class="label">
                <span class="label-text font-medium">Nombre del contacto</span>
            </label>
            <input type="text" name="name" id="name" required
                class="input input-bordered input-primary w-full" />
        </div>
        <div>
            <label for="last_name" class="label">
                <span class="label-text font-medium">Apellido del contacto</span>
            </label>
            <input type="text" name="last_name" id="last_name" required
                class="input input-bordered input-primary w-full" />
        </div>
        <div class="sm:col-span-2">
            <label for="relationship" class="label">
                <span class="label-text font-medium">Relación con el contacto</span>
            </label>
            <select name="relationship" id="relationship" class="select select-bordered select-primary w-full" required>
                <option value="" disabled selected>Seleccione una relacion</option>
                <option value="pareja">Pareja</option>
                <option value="hijo/a">Hijo/@</option>
                <option value="hermano/a">Hermano/@</option>
                <option value="padres">Padres</option>
                <option value="primo/a">Primo/@</option>
                <option value="abuelo/a">Abuelo/@</option>
                <option value="tio/a">Tio/@</option>
                <option value="amigo">Amigo cercano</option>
            </select>
        </div>
        <div>
            <label for="phone" class="label">
                <span class="label-text font-medium">Telefono del contacto</span>
            </label>
            <input type="number" name="phone" id="phone" required
                class="input input-bordered input-primary w-full" />
        </div>
        <div>
            <label for="address" class="label">
                <span class="label-text font-medium">Direccion del contacto</span>
            </label>
            <input type="text" name="address" id="address" required
                class="input input-bordered input-primary w-full" />
        </div>
        
    </div>
</div>
