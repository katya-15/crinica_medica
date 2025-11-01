<!DOCTYPE html>
<html lang="en" data-theme="forest">

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
    <header class="bg-white/10 backdrop-blur-md border-b border-white/10 shadow-lg relative z-50">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="dropdown">
                        <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                            <button class="btn btn-ghost btn-circle">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"></path>
                                </svg>
                            </button>
                        </div>
                        <ul tabindex="0"
                            class="menu menu-sm dropdown-content bg-base-100 rounded-box z-50 mt-3 w-52 p-2 shadow">
                            
                        </ul>
                    </div>
                    <div>
                        <a href="{{ route('Auth.dashboard') }}" class="text-2xl font-bold">Finca el
                            Suspiro</a>
                        {{-- <div
                            x-data='{ username: @json(Auth::user()->name), lastName: @json(Auth::user()->last_name) }'>
                            Bienvenido: <strong x-text="username + ' ' + lastName"></strong>
                        </div> --}}
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
    <footer class="bg-neutral text-white relative overflow-hidden border-t border-white/10">
        <!-- Decorative horseshoe pattern -->
        <div class="absolute inset-0 horseshoe-pattern"></div>
        <div class="relative z-10 max-w-6xl mx-auto px-6 py-12">
            <!-- Main content -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
                <!-- Logo section with main horseshoe -->
                <div class="lg:col-span-1 text-center lg:text-left">
                    <div class="flex items-center justify-center lg:justify-start mb-4">
                        <div class="relative">
                            <svg class="w-16 h-16 text-yellow-400 drop-shadow-lg" viewBox="0 0 24 24"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 2C7.5 2 4 5.5 4 10v6c0 1.1.9 2 2 2h1c1.1 0 2-.9 2-2v-3c0-.6.4-1 1-1s1 .4 1 1v3c0 1.1.9 2 2 2s2-.9 2-2v-3c0-.6.4-1 1-1s1 .4 1 1v3c0 1.1.9 2 2 2h1c1.1 0 2-.9 2-2v-6c0-4.5-3.5-8-8-8zm6 14h-1v-3c0-1.7-1.3-3-3-3s-3 1.3-3 3v3s0 0 0 0v-3c0-1.7-1.3-3-3-3s-3 1.3-3 3v3H6v-6c0-3.3 2.7-6 6-6s6 2.7 6 6v6z" />
                                <circle cx="8" cy="6" r="1" />
                                <circle cx="16" cy="6" r="1" />
                            </svg>
                            <div class="absolute inset-0 pulse-glow bg-yellow-400/20 rounded-full blur-xl"></div>
                        </div>
                        <div class="ml-3">
                            <h2 class="font-bold text-2xl">FINCA EL SUSPIRO</h2>
                            <p class="text-yellow-200 text-sm">Sistema de Gestión</p>
                        </div>
                    </div>
                    <p class="text-amber-100 text-sm leading-relaxed">
                        Sistema integral de gestión ganadera que combina tecnología moderna
                        con el conocimiento tradicional del campo.
                    </p>
                </div>
                <!-- Contact Info -->
                <div class="text-center lg:text-left">
                    <h3 class="font-semibold text-lg mb-4 text-yellow-300">Contacto</h3>
                    <div class="space-y-3">
                        <!-- Dirección -->
                        <div class="flex flex-col items-center text-center sm:flex-row sm:text-left sm:justify-start">
                            <i class="fa-solid fa-location-dot w-4 h-4 mr-2 text-yellow-400"></i>
                            <span class="text-sm">
                                Entrar a la aldea Semuy desde la ruta de Chisec, recorrer 17 km y seguir hasta el
                                caserío La Esperanza.
                            </span>
                        </div>
                        <!-- Teléfonos -->
                        <div
                            class="flex flex-col items-center text-center sm:flex-row sm:text-left sm:justify-start sm:space-x-4">
                            <div class="flex items-center">
                                <i class="fa-solid fa-phone-office w-4 h-4 mr-2 text-yellow-400"></i>
                                <span class="text-sm">+502 5044 3417</span>
                            </div>
                            <span class="text-sm">+502 5332 5433</span>
                        </div>
                    </div>
                </div>
                <!-- Social Media -->
                <div class="text-center lg:text-left">
                    <h3 class="font-semibold text-lg mb-4 text-yellow-300">Síguenos</h3>
                    <div class="flex justify-center lg:justify-start space-x-4 mb-4">
                        <a href="#"
                            class="w-10 h-10 flex items-center justify-center rounded-full transition-all duration-300 transform hover:scale-110
                   bg-gradient-to-r from-[#f09433] via-[#dc2743] to-[#bc1888] hover:from-[#f09433] hover:via-[#e6683c] hover:to-[#bc1888]">
                            <i class="fa-brands fa-instagram text-white"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 flex items-center justify-center bg-blue-500 hover:bg-blue-400 rounded-full transition-all duration-300 transform hover:scale-110">
                            <i class="fa-brands fa-facebook text-white"></i>
                        </a>
                    </div>
                    <p class="text-amber-100 text-xs">
                        Comparte tus momentos con #FINCA_EL_SUSPIRO
                    </p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
