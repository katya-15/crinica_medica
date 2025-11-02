<div class="card w-full max-w-2xl mx-auto mt-6">
    <div class="card-body">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label for="name" class="label">
                    <span class="label-text font-medium">Nombre del servicio </span>
                </label>
                <input type="text" name="name" id="name" required
                    class="input input-bordered input-primary w-full" />
            </div>
            <div>
                <label for="price" class="label">
                    <span class="label-text font-medium">Precio del servicio </span>
                </label>
                <input type="number" name="price" id="price" required
                    class="input input-bordered input-primary w-full" />
            </div>
            <div class="sm:col-span-2">
                <label for="description" class="label">
                    <span class="label-text font-medium">Descripcion del servicio </span>
                </label>
                <textarea name="description" id="description" cols="30" rows="10"
                class="textarea textarea-bordered w-full">
                </textarea>
                
            </div>
        </div>
    </div>
</div>
