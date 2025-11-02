<div class="card w-full max-w-2xl mx-auto mt-6">
    <div class="card-body">
        <input type="hidden" name="cod_user" value="{{ $user->id ?? '' }}">
        <div class="mb-4">
            <label for="specialty" class="label">
                <span class="label-text font-medium">Doctor</span>
            </label>
            <input type="text" class="input input-bordered w-full" value="{{ $user->name }} {{ $user->last_name }}"
                disabled>
        </div>
        <div class="sm:col-span-2">
                <label for="specialty" class="label">
                    <span class="label-text font-medium">Especialidad</span>
                </label>
                <select name="specialty" id="specialty" class="select select-bordered select-primary w-full" required>
                    <option value="" disabled selected>Seleccione una especialidad</option>
                    <option value="medico familiar">medico familiar</option>
                    <option value="medico interna">medico interna</option>
                    <option value="pediatrica">pediatria</option>
                    <option value="ginecologia">ginecologia</option>
                    <option value="medico general">medico general</option>
                </select>
            </div>
        <div>
            <label for="collegiate_num" class="label">
                <span class="label-text font-medium">No. Colegiado</span>
            </label>
            <input type="num" name="collegiate_num" id="collegiate_num" required
                class="input input-bordered input-primary w-full" />
        </div>
        <div>
            <label for="experience" class="label cursor-pointer flex-1 mt-2">
                <span class="label-text font-semibold">Cuenta con experiencia</span>
            </label>
            <input type="hidden" name="experience" class="checkbox checkbox-primary" id="deworming" value="0">
            <input type="checkbox" name="experience" value="1" id="deworming" class="checkbox checkbox-primary">
        </div>
        <div>
            <label for="date_hire" class="label mt-2">
                <span class="label-text font-medium">Fecha de contración</span>
            </label>
            <input type="date" name="date_hire" id="date_hire" required
                class="input input-bordered input-primary w-full" />
        </div>
    </div>
</div>
