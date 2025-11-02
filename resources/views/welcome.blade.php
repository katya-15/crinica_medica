<!DOCTYPE html>
<html lang="en" data-theme="cupcake">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css'])
</head>

<body class="min-h-screen flex flex-col">

    {{-- CONTENIDO DE NAVEGACIÓN  --}}
    <header class="backdrop-blur-md border-b border-emerald-200 shadow-lg relative z-50">
        <div class="navbar bg-neutral text-white px-4">
            <!-- Lado izquierdo -->
            <div class="flex-1">
                <button class="btn btn-ghost text-xl">Centro de salud Quetzal</button>
            </div>

            <!-- Lado derecho -->
            <div class="flex-none flex items-center gap-4">
                <a href="{{ route('login') }}" class="btn btn-ghost">Login</a>
            </div>
        </div>
    </header>

    {{-- CONTENIDO DE CUERPO DE LADINGPAGE --}}
    <main class="flex-grow container mx-auto px-4 py-6">

        <div class="container mx-auto px-6 max-w-5xl py-8">
            <div class="hero">
                <div class="hero-content flex-col lg:flex-row-reverse gap-8">
                    <img src="{{ asset('img/vision.jpeg') }}"
                        class="rounded-2xl shadow-xl object-cover w-full h-72 sm:h-80 lg:h-96" />
                    <div>
                        <h1 class="text-5xl text-neutral font-bold">Misión</h1>
                        <p class="py-4 text-neutral">
                            Brindar servicios de atención médica integral de alta calidad y con calidez humana en Cobán
                            y Alta Verapaz, promoviendo la salud preventiva y el bienestar comunitario, y honrando la
                            riqueza cultural y natural de la región en cada interacción con nuestros pacientes.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mx-auto px-6 max-w-5xl py-4">
            <div class="hero">
                <div class="hero-content flex-col lg:flex-row gap-8">
                    <img src="{{ asset('img/consultorio.jpeg') }}"
                        class="rounded-2xl shadow-xl object-cover w-full h-72 sm:h-80 lg:h-96" />
                    <div>
                        <h1 class="text-5xl text-neutral font-bold">Visión</h1>
                        <p class="py-4 text-neutral">
                            Ser reconocido como el centro de referencia médica líder en la región de Alta Verapaz,
                            distinguido por la excelencia profesional, la innovación tecnológica y su profundo
                            compromiso con el desarrollo de la salud sostenible y equitativa para todas las comunidades.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mx-auto px-6 max-w-5xl py-6">
            <div class="hero  ">
                <div class="hero-content text-center">
                    <div class="max-w-md">
                        <h1 class="text-5xl text-neutral font-bold mb-4">Objetivos</h1>

                        <ul class="text-neutral text-left list-disc list-inside space-y-2">
                            <li>
                                <strong>Calidad Clínica:</strong> Alcanzar una tasa de satisfacción del paciente
                                superior al 95%
                                en el primer año de operación.
                            </li>
                            <li>
                                <strong>Alcance Comunitario:</strong> Implementar al menos tres jornadas de salud
                                preventiva gratuitas
                                trimestrales en comunidades de Cobán y municipios aledaños.
                            </li>
                            <li>
                                <strong>Innovación:</strong> Integrar un sistema de telemedicina básico para consultas
                                de seguimiento
                                en áreas de difícil acceso a partir del segundo año.
                            </li>
                            <li>
                                <strong>Cultura:</strong> Integrar personal bilingüe (español-q'eqchi') en el 80% de las
                                áreas de
                                atención directa al paciente.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="container mx-auto py-8">
            <h1 class="text-3xl text-neutral font-bold">Contamos con novedades</h1>
            <div class="flex justify-center py-8">

                <div class="flex flex-row flex-wrap justify-center gap-6">
                    <div class="card bg-base-100 w-80 shadow-md hover:shadow-xl transition-shadow">
                        <figure class="h-56 overflow-hidden">
                            <img src="{{ asset('img/tecnologia.jpg') }}" alt="Shoes"
                                class="w-full h-full object-cover" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title text-neutral">Equipos médicos de última generación</h2>
                            <p class="text-neutral">Contamos con la mejor y más nueva tecnología médica para cuidarte.
                                Esto significa diagnósticos más precisos y tratamientos más rápidos y efectivos. </p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="card bg-base-100 w-80 shadow-md hover:shadow-xl transition-shadow">
                        <figure class="h-56 overflow-hidden">
                            <img src="{{ asset('img/fisioterapia.jpeg') }}" alt="Shoes"
                                class="w-full h-full object-cover" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title text-neutral">Fisioterapia</h2>
                            <p class="text-neutral">Nuestros tratamientos de fisioterapia le ayudan a dejar atrás el
                                dolor, recuperar la fuerza y la movilidad después de una lesión o cirugía.
                            </p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="card bg-base-100 w-80 shadow-md hover:shadow-xl transition-shadow">
                        <figure class="h-56 overflow-hidden">
                            <img src="{{ asset('img/tomografo.jpg') }}" alt="Shoes"
                                class="w-full h-full object-cover" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title text-neutral">Tomógrafo Computarizado </h2>
                            <p class="text-neutral">Hemos adquirido un Tomógrafo Computarizado de última generación, una
                                pieza clave en nuestra misión de brindar un diagnóstico excepcional.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container mx-auto px-6 max-w-5xl py-6">
            <div class="hero  ">
                <div class="hero-content text-center">
                    <div class="max-w-md">
                        <h1 class="text-5xl text-neutral font-bold mb-4">Catalogo de servicios</h1>


                        <div class="text-neutral text-left list-disc list-inside space-y-2">

                            @foreach ($servicio as $item)
                                <div class="bg-white shadow-lg rounded-lg p-4">
                                    <h2 class="text-xl font-semibold mb-2">{{ $item->name }}</h2>
                                    <p class="text-gray-600 mb-3">{{ $item->description }}</p>
                                    <span class="block text-indigo-600 font-bold">Q. {{ $item->price }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
    {{-- CONTENIDO DE FOOTER PIE DE PAGINA --}}
    <footer class="footer footer-horizontal footer-center bg-primary text-base-content rounded p-2">
        <nav class="grid grid-flow-col gap-4">
        </nav>
        <nav>
            <div class="grid grid-flow-col gap-4">
                <a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        class="fill-current">
                        <path
                            d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z">
                        </path>
                    </svg>
                </a>
                <a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        class="fill-current">
                        <path
                            d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z">
                        </path>
                    </svg>
                </a>
                <a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        class="fill-current">
                        <path
                            d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z">
                        </path>
                    </svg>
                </a>
            </div>
        </nav>
        <aside>
            <p class="text-neutral">Derechos reservados @katya_Company</p>
        </aside>
    </footer>
</body>

</html>
