<div class="card w-full max-w-2xl mx-auto mt-6">
    <div class="card-body">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label for="name" class="label">
                    <span class="label-text font-medium">Nombre *</span>
                </label>
                <input type="text" name="name" id="name" required
                    class="input input-bordered input-primary w-full" value="{{ old('name') }}" />
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="last_name" class="label">
                    <span class="label-text font-medium">Apellido</span>
                </label>
                <input type="text" name="last_name" id="last_name" class="input input-bordered input-primary w-full"
                    value="{{ old('last_name') }}" />
                @error('last_name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="sm:col-span-2">
                <label for="address" class="label">
                    <span class="label-text font-medium">Dirección del paciente *</span>
                </label>
                <input type="text" name="address" id="address" required
                    class="input input-bordered input-primary w-full" value="{{ old('address') }}" />
                @error('address')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="phone" class="label">
                    <span class="label-text font-medium">Teléfono *</span>
                </label>
                <input type="tel" name="phone" id="phone" required
                    class="input input-bordered input-primary w-full" value="{{ old('phone') }}" />
                @error('phone')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="dpi" class="label">
                    <span class="label-text font-medium">DPI *</span>
                </label>
                <input type="tel" name="dpi" id="dpi" required maxlength="13"
                    class="input input-bordered input-primary w-full" value="{{ old('dpi') }}" />
                @error('dpi')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="email" class="label">
                    <span class="label-text font-medium">Email *</span>
                </label>
                <input type="email" name="email" id="email" required
                    class="input input-bordered input-primary w-full" value="{{ old('email') }}" />
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="birthdate" class="label">
                    <span class="label-text font-medium">Fecha de nacimiento *</span>
                </label>
                <input type="date" name="birthdate" id="birthdate" required
                    class="input input-bordered input-primary w-full" value="{{ old('birthdate') }}" />
                @error('birthdate')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="type_blood" class="label">
                    <span class="label-text font-medium">Tipo de sangre *</span>
                </label>
                <select name="type_blood" id="type_blood" class="select select-bordered select-primary w-full" required>
                    <option value="" disabled selected>Seleccione tipo de sangre</option>
                    <option value="A+" {{ old('type_blood') == 'A+' ? 'selected' : '' }}>A+</option>
                    <option value="A-" {{ old('type_blood') == 'A-' ? 'selected' : '' }}>A-</option>
                    <option value="B+" {{ old('type_blood') == 'B+' ? 'selected' : '' }}>B+</option>
                    <option value="B-" {{ old('type_blood') == 'B-' ? 'selected' : '' }}>B-</option>
                    <option value="AB+" {{ old('type_blood') == 'AB+' ? 'selected' : '' }}>AB+</option>
                    <option value="AB-" {{ old('type_blood') == 'AB-' ? 'selected' : '' }}>AB-</option>
                    <option value="O+" {{ old('type_blood') == 'O+' ? 'selected' : '' }}>O+</option>
                    <option value="O-" {{ old('type_blood') == 'O-' ? 'selected' : '' }}>O-</option>
                    <option value="N/A" {{ old('type_blood') == 'N/A' ? 'selected' : '' }}>No sabe</option>
                </select>
                @error('type_blood')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="sm:col-span-2">
                <label for="allergies" class="label">
                    <span class="label-text font-medium">Alergias</span>
                </label>
                <textarea name="allergies" id="allergies" cols="0" rows="4" class="textarea textarea-bordered w-full">{{ old('allergies') }}</textarea>
                @error('allergies')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="sm:col-span-2">
                <label for="chronic_diseases" class="label">
                    <span class="label-text font-medium">Enfermedades crónicas</span>
                </label>
                <textarea name="chronic_diseases" id="chronic_diseases" cols="0" rows="4"
                    class="textarea textarea-bordered w-full">{{ old('chronic_diseases') }}</textarea>
                @error('chronic_diseases')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="weight" class="label">
                    <span class="label-text font-medium">Peso (Lb) *</span>
                </label>
                <input type="number" name="weight" id="weight" required step="0.01" min="1"
                    max="500" class="input input-bordered input-primary w-full" value="{{ old('weight') }}" />
                @error('weight')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="height" class="label">
                    <span class="label-text font-medium">Altura (Cm) *</span>
                </label>
                <input type="number" name="height" id="height" required step="0.01" min="0.5"
                    max="300" class="input input-bordered input-primary w-full" value="{{ old('height') }}" />
                @error('height')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="entrydate" class="label">
                    <span class="label-text font-medium">Fecha de ingreso *</span>
                </label>
                <input type="date" name="entrydate" id="entrydate" required
                    class="input input-bordered input-primary w-full"
                    value="{{ old('entrydate', date('Y-m-d')) }}" />
                @error('entrydate')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
</div>
