<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Explorar Cursos') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Buscador profesional --}}
            <div class="mb-10 max-w-2xl mx-auto">
                <div class="relative shadow-sm">
                    <input type="text" placeholder="¿Qué quieres aprender hoy?" 
                           class="w-full pl-5 pr-12 py-4 border-none rounded-full focus:ring-2 focus:ring-blue-500 text-gray-600 shadow-md">
                    <button class="absolute right-4 top-1/2 transform -translate-y-1/2 text-blue-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Rejilla de Cursos Dinámicos --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @forelse($courses as $course)
                    <a href="{{ route('courses.show', $course->id) }}" class="group block h-full">
                        {{-- Contenedor principal con flex-col para alinear el contenido al fondo --}}
                        <div class="bg-white rounded-2xl overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl border border-gray-100 flex flex-col h-full">
                            
                            {{-- Imagen con efecto de zoom --}}
                            <div class="relative overflow-hidden rounded-t-2xl">
                                <img src="{{ $course->image_path ? asset('storage/'.$course->image_path) : asset('img/php.jpg') }}" 
                                     alt="{{ $course->title }}"
                                     class="w-full h-48 object-cover transition-transform duration-500 group-hover:scale-110">
                            </div>

                            {{-- Cuerpo de la tarjeta --}}
                            <div class="p-5 pt-3 flex flex-col flex-grow">
                                {{-- Título con altura mínima para que todas las cajas midan lo mismo --}}
                                <h3 class="text-sm font-bold text-gray-900 leading-snug mb-1 min-h-[40px] group-hover:text-blue-600">
                                    {{ $course->title }}
                                </h3>
                                
                                <p class="text-xs text-gray-500 mb-2">EduTech Team</p>
                                
                                <div class="text-base font-extrabold text-gray-900 mb-2">
                                    S/ {{ number_format($course->price, 2) }}
                                </div>
                                
                                {{-- Footer de la tarjeta alineado al fondo con mt-auto --}}
                                <div class="mt-auto">
                                    <div class="flex items-center text-[11px] text-gray-600 mb-3">
                                        <span class="text-yellow-400 mr-1">★</span>
                                        <span class="font-bold mr-1">4.9</span>
                                        <span class="text-gray-400">({{ rand(50, 200) }})</span>
                                        <span class="mx-2 text-gray-300">•</span>
                                        <span class="flex items-center">+ 100 personas</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    {{-- Mensaje en caso de que no existan cursos en la BD --}}
                    <div class="col-span-full text-center py-12">
                        <p class="text-gray-500 text-lg">No hay cursos publicados todavía en Laragon.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>