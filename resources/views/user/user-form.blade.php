<div class="card w-full max-w-2xl mx-auto mt-6">
    <div class="card-body">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label for="name" class="label">
                    <span class="label-text font-medium">Nombre</span>
                </label>
                <input type="text" name="name" id="name" required
                    class="input input-bordered input-primary w-full" />
            </div>

            <div>
                <label for="last_name" class="label">
                    <span class="label-text font-medium">Apellido</span>
                </label>
                <input type="text" name="last_name" id="last_name" required
                    class="input input-bordered input-primary w-full" />
            </div>

            <div>
                <label for="username" class="label">
                    <span class="label-text font-medium">Nombre de usuario</span>
                </label>
                <input type="text" name="username" id="username" required
                    class="input input-bordered input-primary w-full" />
            </div>

            <div>
                <label for="phone" class="label">
                    <span class="label-text font-medium">Teléfono</span>
                </label>
                <input type="tel" name="phone" id="phone" required
                    class="input input-bordered input-primary w-full" />
            </div>

            <div>
                <label for="dpi" class="label">
                    <span class="label-text font-medium">DPI</span>
                </label>
                <input type="tel" name="dpi" id="dpi" required
                    class="input input-bordered input-primary w-full" />
            </div>

            <div>
                <label for="password" class="label">
                    <span class="label-text font-medium">Contraseña</span>
                </label>
                <input type="password" name="password" id="password" required
                    class="input input-bordered input-secondary w-full" />
            </div>

            <div>
                <label for="password_confirmation" class="label">
                    <span class="label-text font-medium">Confirmar contraseña</span>
                </label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                    class="input input-bordered input-secondary w-full" />
            </div>

            <div class="sm:col-span-2">
                <label for="rol" class="label">
                    <span class="label-text font-medium">Rol</span>
                </label>
                <select name="rol" id="rol" class="select select-bordered select-accent w-full" required>
                    <option value="" disabled selected>Seleccione un rol</option>
                    <option value="admin">Administrador</option>
                    <option value="recepcionista">Recepcionista</option>
                    <option value="medico">Médico</option>
                </select>
            </div>
        </div>
    </div>
</div>
