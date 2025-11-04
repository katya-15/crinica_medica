<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        {{-- Encabezado --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
            <div class="flex items-center gap-3">
                <div class="bg-base-200 p-3 rounded-full">
                    <i class="fa-solid fa-calendar-check text-xl text-secondary-content"></i>
                </div>
                <h1 class="text-2xl sm:text-3xl font-bold text-secondary-content">
                    Gestión de Citas Médicas
                </h1>
            </div>
        </div>

        {{-- Mensajes --}}
        @if (session('success'))
            <div class="alert alert-success shadow-lg mb-4">
                <div>
                    <i class="fa-solid fa-circle-check"></i>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
        @elseif (session('error'))
            <div class="alert alert-error shadow-lg mb-4">
                <div>
                    <i class="fa-solid fa-circle-xmark"></i>
                    <span>{{ session('error') }}</span>
                </div>
            </div>
        @endif

        {{-- Contenedor de citas semanales --}}
        <div class="p-6 bg-base-100 rounded-xl " x-data="citasSemana({{ json_encode($citas) }})">
            {{-- Filtros --}}
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">
                <div class="flex items-center gap-2">
                    <button class="btn btn-ghost" @click="cambiarSemana(-1)">◀</button>
                    <button class="btn btn-ghost" @click="hoy()">Hoy</button>
                    <button class="btn btn-ghost" @click="cambiarSemana(1)">▶</button>
                    <div class="ml-4 text-sm opacity-80">
                        Semana del <strong x-text="formatearFecha(inicioSemana)"></strong>
                    </div>
                </div>

                <div class="flex gap-2 items-center">
                    <select class="select select-bordered select-sm" x-model="filtroDoctor">
                        <option value="all">Todos los doctores</option>
                        @foreach ($medicos as $d)
                            <option value="{{ $d->id }}">{{ $d->name }}</option>
                        @endforeach
                    </select>

                    <input type="text" placeholder="Buscar paciente o motivo"
                        class="input input-bordered input-sm" x-model="busqueda">
                </div>
            </div>

            {{-- Vista semanal en escritorio --}}
            <div class="hidden lg:grid lg:grid-cols-5 lg:gap-3">
                <template x-for="(dia, index) in diasSemana" :key="index">
                    <div class="bg-base-200 rounded-lg p-3 flex flex-col">
                        <div class="flex justify-between items-center mb-2">
                            <div>
                                <div class="text-xs opacity-70" x-text="formatearFechaCorta(dia)"></div>
                                <div class="font-semibold capitalize" x-text="nombreDia(dia)"></div>
                            </div>
                            <div class="flex gap-2 items-center">
                                <span class="text-xs opacity-60" x-text="citasDia(dia).length + ' citas'"></span>
                                <button class="btn btn-ghost btn-xs" @click="toggleDia(index)"
                                    x-text="diasColapsados[index] ? 'Expandir' : 'Colapsar'"></button>
                            </div>
                        </div>

                        <div x-show="!diasColapsados[index]" class="space-y-2 overflow-auto pr-1">
                            <template x-if="citasDia(dia).length === 0">
                                <div class="text-sm opacity-60">Sin citas</div>
                            </template>

                            <template x-for="cita in citasDia(dia)" :key="cita.id">
                                <div class="card card-compact bg-base-100 border border-base-300">
                                    <div class="card-body p-3">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <div class="text-sm font-semibold" x-text="cita.paciente"></div>
                                                <div class="text-xs opacity-60">
                                                    <span x-text="cita.servicio"></span> ·
                                                    <span x-text="formatearHora(cita.hora_inicio)"></span>
                                                </div>
                                                <div class="text-xs opacity-60 italic" x-text="cita.motivo"></div>
                                            </div>
                                            <div class="text-right">
                                                <div class="badge badge-outline" :class="estadoClase(cita.status)"
                                                    x-text="estadoTexto(cita.status)"></div>
                                                <div class="text-xs opacity-60" x-text="cita.doctor ?? 'Sin asignar'">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </template>
            </div>

            {{-- Vista móvil --}}
            <div class="lg:hidden space-y-3">
                <template x-for="(dia, index) in diasSemana" :key="index">
                    <div class="collapse collapse-arrow border rounded-box">
                        <input type="checkbox" class="peer" checked>
                        <div class="collapse-title flex justify-between">
                            <div>
                                <div class="text-sm font-semibold capitalize" x-text="nombreDia(dia)"></div>
                                <div class="text-xs opacity-60" x-text="citasDia(dia).length + ' citas'"></div>
                            </div>
                            <div class="text-xs opacity-60" x-text="formatearFechaCorta(dia)"></div>
                        </div>
                        <div class="collapse-content space-y-2">
                            <template x-for="cita in citasDia(dia)" :key="cita.id">
                                <div class="card card-side bg-base-100 shadow-sm">
                                    <div class="card-body p-3">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <div class="font-medium" x-text="cita.paciente"></div>
                                                <div class="text-xs opacity-60">
                                                    <span x-text="formatearHora(cita.hora_inicio)"></span> ·
                                                    <span x-text="cita.servicio"></span>
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <div class="badge badge-outline" :class="estadoClase(cita.status)"
                                                    x-text="estadoTexto(cita.status)"></div>
                                                <div class="text-xs opacity-60" x-text="cita.doctor ?? 'Sin asignar'">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </div>
</x-app-layout>

{{-- Script Alpine.js --}}
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('citasSemana', (citas) => ({
            citas,
            inicioSemana: new Date(),
            filtroDoctor: 'all',
            busqueda: '',
            diasColapsados: {},

            get diasSemana() {
                const dias = []
                const lunes = this.obtenerLunes(this.inicioSemana)
                // 🔹 Solo lunes a viernes
                for (let i = 0; i < 5; i++) {
                    const d = new Date(lunes)
                    d.setDate(lunes.getDate() + i)
                    dias.push(d)
                }
                return dias
            },

            citasDia(dia) {
                const inicio = new Date(dia)
                inicio.setHours(0, 0, 0, 0)
                const fin = new Date(dia)
                fin.setHours(23, 59, 59, 999)
                
                const citasFiltradas = this.citas.filter(c => {
                    const dt = new Date(c.fecha)
                    if (this.filtroDoctor !== 'all' && c.cod_user != this.filtroDoctor)
                        return false
                    if (this.busqueda &&
                        !c.paciente.toLowerCase().includes(this.busqueda.toLowerCase()) &&
                        !c.motivo.toLowerCase().includes(this.busqueda.toLowerCase()))
                        return false
                    return dt >= inicio && dt <= fin
                })

                // 🔹 ORDENAR LAS CITAS POR HORA
                return citasFiltradas.sort((a, b) => {
                    // Convertir horas a minutos para comparar numéricamente
                    const horaA = this.horaAMinutos(a.hora_inicio)
                    const horaB = this.horaAMinutos(b.hora_inicio)
                    return horaA - horaB
                })
            },

            // Función auxiliar para convertir hora HH:MM:SS a minutos
            horaAMinutos(hora) {
                if (!hora) return 0
                const [horas, minutos] = hora.split(':')
                return parseInt(horas) * 60 + parseInt(minutos)
            },

            cambiarSemana(delta) {
                const nueva = new Date(this.inicioSemana)
                nueva.setDate(nueva.getDate() + delta * 7)
                this.inicioSemana = nueva
            },
            hoy() {
                this.inicioSemana = new Date()
            },
            toggleDia(i) {
                this.diasColapsados[i] = !this.diasColapsados[i]
            },
            obtenerLunes(fecha) {
                const d = new Date(fecha)
                const day = d.getDay()
                const diff = d.getDate() - day + (day === 0 ? -6 : 1)
                return new Date(d.setDate(diff))
            },
            formatearFecha(f) {
                return new Date(f).toLocaleDateString()
            },
            formatearFechaCorta(f) {
                return new Date(f).toLocaleDateString(undefined, {
                    weekday: 'short',
                    day: '2-digit',
                    month: 'short'
                })
            },
            nombreDia(f) {
                return new Date(f).toLocaleDateString(undefined, {
                    weekday: 'long'
                })
            },
            formatearHora(h) {
                return h.slice(0, 5)
            },
            estadoClase(s) {
                return {
                    '1': 'badge-success',
                    '2': 'badge-warning',
                    '0': 'badge-error',
                }[s] || 'badge-ghost'
            },
            estadoTexto(s) {
                return {
                    '1': 'Confirmada',
                    '2': 'Pendiente',
                    '0': 'Cancelada',
                }[s] || 'Desconocido'
            }
        }))
    })
</script>