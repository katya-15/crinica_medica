<!DOCTYPE html>
<html lang="en" data-theme="silk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/all.css">
    <!-- alpine js  -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>
    {{-- alpine core --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="min-h-screen flex flex-col">
    <!-- Menú de navegación -->
    <header class="bg-neutral backdrop-blur-md border-b border-neutral shadow-lg relative z-50">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="dropdown">
                        <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                            <button class="btn btn-ghost btn-circle text-white">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"></path>
                                </svg>
                            </button>
                        </div>
                        <ul tabindex="0"
                            class="menu menu-sm dropdown-content bg-base-100 rounded-box z-50 mt-3 w-55 p-2 shadow">
                            <li>
                                <h2 class="menu-title">Operaciones</h2>
                                <ul>
                                    <li><a href="{{ route('Paciente.show') }}" class="text text-sm sm:text-xl"><i
                                                class="fa-solid fa-clipboard-medical"></i> Pacientes</a></li>
                                    <li><a href="{{ route('Servicio.show') }}" class="text text-sm sm:text-xl"><i
                                                class="fa-solid fa-cart-shopping"></i> Servicios</a></li>
                                    <li><a href="{{ route('Cita.show') }}" class="text text-sm sm:text-xl"><i
                                                class="fa-solid fa-calendar-days"></i> Visitas</a></li>
                                </ul>
                            </li>

                            <li>
                                <h2 class="menu-title">Administración</h2>
                                <ul>
                                    <li><a href="{{ route('User.show') }}" class="text text-sm sm:text-xl"><i
                                                class="fa-solid fa-user"></i> Usuarios</a></li>
                                    <li><a href="{{ route('Factura.show') }}" class="text text-sm sm:text-xl"><i
                                                class="fa-solid fa-briefcase-blank"></i> Administración</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="text-white">
                        <a href="{{ route('Auth.dashboard') }}" class="text-2xl font-bold">Clinica Quetzal</a>
                        <div
                            x-data='{ username: @json(Auth::user()->name), lastName: @json(Auth::user()->last_name) }'>
                            Bienvenido: <strong x-text="username + ' ' + lastName"></strong>
                        </div>
                    </div>
                </div>
                <div x-data="{ openChangePassword: false }" class="flex items-center space-x-4">
                    <ul class="btn btn-ghost btn-circle text-white">
                        <li>
                            <a href="{{ route('Auth.logout') }}" class="btn btn-circle">
                                <i class="fa-light fa-arrow-right-from-bracket text-sm sm:text-xl"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </header>
    <!-- Cuerpo de la pagina -->
    <main class="flex-grow container mx-auto px-4 py-6">
        {{ $slot }}
    </main>
    <!-- Pie de pagina -->
    <footer class="footer footer-horizontal footer-center bg-primary text-base-content rounded p-2">
        <nav class="grid grid-flow-col gap-4">
        </nav>
        <nav>

        </nav>
        <aside>
            <p class="text-white">Derechos reservados @katya_Company</p>
        </aside>
    </footer>
</body>

</html>
