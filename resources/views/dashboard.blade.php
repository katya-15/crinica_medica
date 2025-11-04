<x-app-layout>
    <!-- Contenedor principal -->
    <div class="container mx-auto px-4 py-8">
        <!-- Grid principal -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">

            <!-- Columna izquierda - Clientes -->
            <div class="lg:col-span-1 bg-primary rounded-xl shadow-sm p-6 border">
                <h2 class="text-xl font-bold text-white mb-6">Clientes</h2>

                <!-- Tarjetas de clientes -->
                <div class="space-y-4">
                    <div class="p-4 bg-info-content rounded-lg border border-info-content">
                        <h3 class="font-semibold text-white">Activos</h3>
                        <p class="text-2xl font-bold text-blue-400">{{ number_format($paciente) }}</p>
                        <p class="text-sm text-white mt-1">En sistema</p>
                    </div>

                    <div class="p-4 bg-error-content rounded-lg border border-error-content">
                        <h3 class="font-semibold text-white">Bajas</h3>
                        <p class="text-2xl font-bold text-red-400">{{ number_format($paciente_inact) }}</p>
                        <p class="text-sm text-white mt-1">En sistema</p>
                    </div>

                    <div class="p-4 bg-neutral-content rounded-lg border border-neutral-content">
                        <h3 class="font-semibold text-black">Atendidos</h3>
                        <p class="text-2xl font-bold text-gray-600">{{ $porcentajeFinalizadas }}%</p>
                        <p class="text-sm text-black mt-1">Este mes</p>
                    </div>
                    <div class="p-4 bg-warning rounded-lg border border-warning">
                        <h3 class="font-semibold text-black">Pendientes</h3>
                        <p class="text-2xl font-bold text-orange-500">{{ $porcentajePendientes }}%</p>
                        <p class="text-sm text-black mt-1">Este mes</p>
                    </div>
                </div>
            </div>

            <!-- Columna derecha - Estadísticas principales -->
            <div class="lg:col-span-3 space-y-6">

                <!-- Fila superior - Estadísticas horizontales -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Total Likes -->
                    <div class="stat bg-info shadow rounded-xl border">
                        <div class="stat-figure text-black">
                            <i class="fa-solid fa-list-timeline text-3xl"></i>
                        </div>
                        <div class="stat-title text-black">citas planificadas</div>
                        <div class="stat-value text-black text-3xl">{{ $citasPlanificadasHoy }}</div>
                        <div class="stat-desc text-black">{{ $fechaHoy }}</div>
                    </div>

                    <!-- Page Views -->
                    <div class="stat bg-base-content shadow rounded-xl border">
                        <div class="stat-figure text-white">
                            <i class="fa-solid fa-ballot-check text-3xl"></i>
                        </div>
                        <div class="stat-title text-white">citas pendientes</div>
                        <div class="stat-value text-white text-3xl">{{ $citasPendientesHoy }}</div>
                        <div class="stat-desc text-white">{{ $fechaHoy }}</div>
                    </div>

                    <!-- Tasks -->
                    <div class="stat bg-success shadow rounded-xl border">
                        <div class="stat-figure text-accent">
                            <i class="fa-solid fa-check-double text-3xl"></i>
                        </div>
                        <div class="stat-title text-gray-600">citas completadas</div>
                        <div class="stat-value text-accent text-3xl">{{ $citasCompletasHoy }}</div>
                        <div class="stat-desc text-gray-500">{{ $fechaHoy }}</div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>
