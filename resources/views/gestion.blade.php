<x-app-layout>
    <div class="bg-white">
        <div class="relative py-20 px-4 sm:px-6 lg:px-8 text-center bg-gray-50 overflow-hidden">
            <div class="absolute inset-0 opacity-10 flex flex-wrap justify-center items-center text-4xl font-bold gap-10 pointer-events-none select-none">
                <span>Remember</span> <span>Back-End</span> <span>Coding</span> <span>Lemonbase</span>
            </div>

            <div class="relative z-10">
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">
                    Comparte conocimientos en <span class="text-green-600">EduTech</span>, <br>
                    tu elección más inteligente
                </h1>
                <p class="text-lg font-bold text-gray-800 mb-2">Hasta un 90% de participación en los ingresos</p>
                <p class="text-gray-600 mb-10">Maximice sus ganancias mientras minimiza los problemas operativos.</p>

                <a href="{{ route('instructor.solicitud') }}" class="inline-flex items-center px-8 py-4 bg-gray-900 text-white rounded-full font-bold text-lg hover:bg-gray-800 transition shadow-lg">
                    Empieza a compartir conocimientos 
                    <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
        </div>

        <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8 border-t border-gray-100">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div>
                    <p class="text-green-600 font-bold text-sm mb-1">Pagos totales</p>
                    <p class="text-3xl md:text-4xl font-extrabold text-gray-900">Más de 38,8 millones</p>
                    <p class="text-xl font-bold text-gray-900 mt-1">de dólares</p>
                </div>
                <div>
                    <p class="text-green-600 font-bold text-sm mb-1">Ganancias del instructor (promedio)</p>
                    <p class="text-3xl md:text-4xl font-extrabold text-gray-900">$13.3K+</p>
                </div>
                <div>
                    <p class="text-green-600 font-bold text-sm mb-1">Total de instructores</p>
                    <p class="text-3xl md:text-4xl font-extrabold text-gray-900">6,205+</p>
                </div>
                <div>
                    <p class="text-green-600 font-bold text-sm mb-1">Total de estudiantes</p>
                    <p class="text-3xl md:text-4xl font-extrabold text-gray-900">12 millones+</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>