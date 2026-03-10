<x-app-layout>
    {{-- Banner Superior Oscuro --}}
    <div class="bg-[#0f172a] text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-center">
                <div class="lg:col-span-2">
                    <div class="flex items-center space-x-2 mb-4">
                        <span class="bg-blue-600 text-xs font-bold px-3 py-1 rounded uppercase tracking-wider">
                            {{ $course->categories->first()->name ?? 'General' }}
                        </span>
                    </div>
                    <h1 class="text-4xl font-extrabold mb-4 italic">{{ $course->title }}</h1>
                    <p class="text-xl text-gray-400 mb-6 font-medium italic">
                        {{ $course->summary ?? 'Sin resumen disponible.' }}
                    </p>
                    <div class="flex items-center text-sm space-x-4">
                        <span class="text-yellow-400 font-bold">★ 4.9 ({{ $course->students_count }} estudiantes)</span>
                        <span class="text-gray-400 italic">Creado por <span class="text-blue-400 underline">{{ $course->teacher->name }}</span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Contenido Principal --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            
            {{-- COLUMNA IZQUIERDA: Información del curso --}}
            <div class="lg:col-span-2 space-y-10">
                

                {{-- 1. Lo que aprenderán los estudiantes --}}
                <div class="bg-white border border-gray-100 rounded-3xl p-8 shadow-sm">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6 italic">Lo que aprenderán los estudiantes</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        {{-- Aquí recorremos el arreglo real de la base de datos --}}
                        @forelse($course->learning_outcomes ?? [] as $outcome)
                            <div class="flex items-start text-gray-600 animate-fadeIn">
                                <span class="text-[#1ae195] mr-3 font-bold text-lg">✓</span>
                                <span class="text-sm leading-relaxed">{{ $outcome }}</span>
                            </div>
                        @empty
                            {{-- Esto sale si el instructor no ha puesto nada aún --}}
                            <p class="text-gray-400 italic text-sm">El instructor aún no ha definido los objetivos de aprendizaje.</p>
                        @endforelse
                    </div>
                </div>

                {{-- 2. Detalles del Curso (Cuadro Ordenadito) --}}
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 mt-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                        {{-- Categorías --}}
                        <div>
                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-3">Categorías</p>
                            <div class="flex flex-wrap gap-2">
                                @forelse($course->categories as $category)
                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold border border-green-200">
                                        {{ $category->name }}
                                    </span>
                                @empty
                                    <span class="text-gray-400 italic text-sm">Sin categorías</span>
                                @endforelse
                            </div>
                        </div>

                        {{-- Nivel --}}
                        <div>
                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-3">Nivel del curso</p>
                            <span class="text-gray-800 font-bold capitalize bg-gray-50 px-3 py-1 rounded-lg border border-gray-100">
                                {{ $course->level ?? 'Básico' }}
                            </span>
                        </div>
                    </div>

                    {{-- Descripción Dinámica --}}
                    <div class="mt-8 pt-8 border-t border-gray-50">
                        <h2 class="text-xl font-bold text-gray-800 mb-4 italic">Descripción detallada</h2>
                        <div class="text-gray-600 text-sm leading-relaxed">
                            {{-- Aquí es donde jalamos la descripción real de HeidiSQL --}}
                            {!! nl2br(e($course->description ?? 'El instructor aún no ha cargado una descripción detallada.')) !!}
                        </div>
                    </div>
                </div>
            </div> {{-- FIN COLUMNA IZQUIERDA --}}

            {{-- COLUMNA DERECHA: Tarjeta Flotante de Compra --}}
            <div class="lg:col-span-1">
                <div class="sticky top-8 bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100">
                    {{-- Imagen de portada dinámica --}}
                    <img src="{{ $course->image_path ? asset('storage/' . $course->image_path) : asset('img/default.jpg') }}" 
                        class="w-full h-48 object-cover">
                    
                    <div class="p-8 space-y-6">
                        <div class="text-4xl font-black text-gray-900">
                            S/ {{ number_format($course->price, 2) }}
                        </div>
                        
                        <a href="{{ route('courses.payment', $course) }}" 
                           class="w-full bg-[#1ae195] text-white py-4 rounded-xl font-bold text-lg flex items-center justify-center hover:bg-[#17c984] transition shadow-lg">
                            Inscríbete ahora
                        </a>
                        
                        <p class="text-[10px] text-center text-gray-400 uppercase font-bold tracking-widest">
                            Garantía de satisfacción de 30 días
                        </p>
                    </div>
                </div>
            </div> {{-- FIN COLUMNA DERECHA --}}

        </div> {{-- FIN GRID PRINCIPAL --}}
    </div> {{-- FIN CONTENEDOR PRINCIPAL --}}
</x-app-layout>