<!DOCTYPE html>
<html lang="en" data-theme="cupcake">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css'])
    <!-- font awesome  -->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/all.css">
    <!-- boostrap icons  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@700&display=swap" rel="stylesheet">
</head>

<body class="min-h-screen">
    <div class="min-h-screen flex items-center justify-center p-2 sm:p-4">
        <div
            class="w-full max-w-4xl bg-neutral backdrop-blur-custom rounded-2xl shadow-2xl border border-white/20 overflow-hidden">
            <div class="grid md:grid-cols-2 min-h-[500px] md:min-h-[800px]">
                <div class="p-6 sm:p-8 lg:p-12 flex flex-col justify-center order-2 md:order-1">
                    <div class="text-center space-y-2 mb-6 sm:mb-8">
                        <h1 class="text-2xl sm:text-3xl font-bold tracking-tight text-white">
                            Bienvenido
                        </h1>
                        <p class="text-white text-sm sm:text-base">
                            Ingresa a tu cuenta para continuar
                        </p>
                    </div>
                    <div class="space-y-4 sm:space-y-6">
                        <form action="{{ route('Auth.login') }}" method="POST" class="space-y-3 sm:space-y-4">
                            @csrf

                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-medium text-white">Usuario</span>
                                </label>
                                <div class="relative text-black">
                                    <i
                                        class="fa-solid fa-user-cowboy absolute left-3 top-1/2 transform -translate-y-1/2 h-4 w-4 text-black"></i>

                                    <input type="text" id="username" name="username" placeholder="Oxri"
                                        class="input input-bordered w-full pl-10 bg-gray-50/50 border-gray-200 focus:bg-white focus:border-indigo-500 transition-all duration-200"
                                        required />
                                </div>
                            </div>
                            <!-- Password Field -->
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text font-medium text-white">Contraseña</span>
                                </label>
                                <div class="relative">
                                    <i
                                        class="fa-solid fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 h-4 w-4 text-black"></i>
                                    <input type="password" id="password" name="password" placeholder="••••••••"
                                        class="text-black input input-bordered w-full pl-10 pr-10 bg-gray-50/50 border-gray-200 focus:bg-white focus:border-indigo-500 transition-all duration-200"
                                        required />
                                    <button type="button" id="togglePassword"
                                        class="absolute right-3 top-1/2 transform -translate-y-1/2 text-black hover:text-gray-600 transition-colors icon-transition">
                                        <!-- Eye Icon (hidden by default) -->
                                        <svg id="eyeIcon" class="h-4 w-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        <!-- Eye Off Icon (visible by default) -->
                                        <svg id="eyeOffIcon" class="h-4 w-4 hidden" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <!-- Login Button -->
                            <button type="submit"
                                class="btn w-full bg-primary hover:bg-purple-700 border-0 text-black hover:text-white shadow-lg normal-case text-base">
                                Iniciar Sesión
                                <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </button>
                        </form>

                    </div>
                </div>
                {{-- <a href="{{ route('Auth.dashboard') }}"></a> --}}
                <div
                    class="relative bg-image-gradient flex items-center justify-center order-1 md:order-2 min-h-[200px] md:min-h-auto">
                    <!-- Background Image -->
                    <div class="absolute inset-0">
                        <img src="{{ asset('img/login.jpeg') }}" alt="Modern workspace"
                            class="w-full h-full object-cover opacity-30" />
                    </div>
                    <!-- Content -->
                    <div class="relative z-10 p-6 sm:p-8 text-center text-white">
                        <div class="max-w-xs mx-auto">
                            <!-- Title -->
                            <h3 class="text-lg sm:text-xl font-semibold mb-2 sm:mb-3 text-white">
                                Clinica Quetzal
                            </h3>
                            <!-- Description -->
                            {{-- style="font-family: 'Quicksand', sans-serif; font-size: 24px; color:black; -webkit-text-stroke: 1px white; font-weight: 900;" --}}
                            <p class="text-white text-xs sm:text-lg leading-relaxed">
                                Todo es posible -había dicho-. No somos dioses, no lo sabemos todo. -Y había añadido-:
                                el coma profundo es un misterio para la medicina.
                            </p>
                            <span class="text-white text-xs sm:text-base leading-relaxed">Marc Levy</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>
<script>
    // Password toggle functionality
    const togglePasswordBtn = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');
    const eyeOffIcon = document.getElementById('eyeOffIcon');

    togglePasswordBtn.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        // Toggle icon visibility
        if (type === 'text') {
            eyeIcon.classList.add('hidden');
            eyeOffIcon.classList.remove('hidden');
        } else {
            eyeIcon.classList.remove('hidden');
            eyeOffIcon.classList.add('hidden');
        }
    });
</script>
