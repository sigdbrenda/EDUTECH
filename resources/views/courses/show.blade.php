<x-app-layout>
    {{-- Banner Superior Oscuro --}}
    <div class="bg-[#0f172a] text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-center">
                <div class="lg:col-span-2">
                    <div class="flex items-center space-x-2 mb-4">
                        <span class="bg-blue-600 text-xs font-bold px-3 py-1 rounded uppercase tracking-wider">
                            {{ $course->category->name ?? 'General' }}
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
                
                {{-- 1. Lo que aprenderán --}}
                <div class="bg-white border border-gray-200 rounded-2xl p-8 shadow-sm">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6 italic">Lo que aprenderán los estudiantes</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @php $metas = explode('.', $course->learning_goals); @endphp
                        @foreach($metas as $meta)
                            @if(trim($meta))
                                <div class="flex items-start text-gray-600">
                                    <span class="text-[#1ae195] mr-3 font-bold">✓</span>
                                    <span class="text-sm leading-relaxed">{{ trim($meta) }}</span>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                {{-- 2. Detalles Técnicos (Categoría y Nivel) --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-100 flex items-center space-x-4">
                        <div class="p-3 bg-white rounded-xl shadow-sm">
                            <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Categoría</p>
                            <p class="text-gray-800 font-bold">{{ $course->category->name ?? 'General' }}</p>
                        </div>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-100 flex items-center space-x-4">
                        <div class="p-3 bg-white rounded-xl shadow-sm">
                            <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Nivel</p>
                            <p class="text-gray-800 font-bold">{{ $course->level ?? 'No especificado' }}</p>
                        </div>
                    </div>
                </div>

                {{-- 3. Descripción --}}
                <div class="space-y-4">
                    <h2 class="text-2xl font-bold text-gray-800 italic">Descripción del curso</h2>
                    <div class="text-gray-600 leading-loose text-lg whitespace-pre-line">
                        {{ $course->description ?? 'No hay una descripción cargada.' }}
                    </div>
                </div>
            </div>

            {{-- COLUMNA DERECHA: Tarjeta Flotante --}}
            <div class="lg:col-span-1">
                <div class="sticky top-8 space-y-6">
                    <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100">
                        <img src="{{ $course->image_path ? asset('storage/'.$course->image_path) : asset('img/php.jpg') }}" 
                             class="w-full h-48 object-cover">
                        <div class="p-8 space-y-6">
                            <div class="text-4xl font-black text-gray-900">S/ {{ number_format($course->price, 2) }}</div>
                            <a href="{{ route('courses.payment', $course) }}" 
                               class="block w-full bg-[#1ae195] text-white py-4 rounded-xl font-bold text-center text-lg hover:bg-[#17c984] transition shadow-lg shadow-teal-50">
                                Inscríbete ahora
                            </a>
                            <p class="text-xs text-center text-gray-400 font-bold uppercase tracking-widest">Garantía de satisfacción</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>