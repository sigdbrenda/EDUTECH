<x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-2xl font-bold text-gray-900">Administrar cursos</h1>
                <div class="flex space-x-3">
                    <a href="{{ route('instructor.nuevo-curso') }}" 
                        style="background-color: #00a878;" 
                        class="px-4 py-2 text-white rounded-md text-sm font-bold shadow-sm hover:opacity-90 flex items-center">
                            Crear nuevo curso
                    </a>
                </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden shadow-sm mt-6">
                
                <div class="flex items-center bg-[#f8f9fa] border-b border-gray-200 text-[12px] font-bold text-gray-600">
                    <div class="py-5 px-6 flex-1 min-w-[200px]">Título</div>
                    <div class="py-5 px-4 w-32 text-center border-l border-gray-200">Estudiantes</div>
                    <div class="py-5 px-4 w-32 text-center border-l border-gray-200">Clasificación</div>
                    <div class="py-5 px-4 w-36 text-center border-l border-gray-200">Sin respuesta</div>
                    <div class="py-5 px-4 w-36 text-center border-l border-gray-200">Idioma original</div>
                    <div class="py-5 px-4 w-28 text-center border-l border-gray-200">Precio</div>
                    <div class="py-5 px-4 w-28 text-center border-l border-gray-200">Estado</div>
                    <div class="py-5 px-4 w-36 text-center border-l border-gray-200 uppercase tracking-tighter">Administrar</div>
                </div>

                @forelse ($courses as $course)
                    <div class="flex items-center bg-white border-b border-gray-200 text-[14px] text-gray-700 hover:bg-gray-50 transition">
                        <div class="py-4 px-6 flex-1 font-medium">{{ $course->title }}</div>
                        <div class="py-4 w-32 text-center border-l border-gray-200">{{ $course->students_count ?? 0 }}</div>
                        <div class="py-4 w-32 text-center border-l border-gray-200">-</div>
                        <div class="py-4 w-36 text-center border-l border-gray-200">0</div>
                        <div class="py-4 w-36 text-center border-l border-gray-200">{{ $course->language }}</div>
                        <div class="py-4 w-28 text-center border-l border-gray-200">S/ {{ number_format($course->price, 2) }}</div>
                        <div class="py-4 w-28 text-center border-l border-gray-200">
                            <span class="px-2 py-1 bg-gray-100 text-xs rounded text-gray-600">{{ $course->status }}</span>
                        </div>
                        <div class="py-4 w-36 text-center border-l border-gray-200 flex justify-center items-center space-x-4">
                            <a href="{{ route('courses.edit', $course->id) }}" class="text-blue-500 hover:text-blue-700 transition-colors" title="Editar">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>

                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este curso?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 transition-colors" title="Borrar">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="flex flex-col items-center justify-center py-24 text-center">
                        <div class="mb-6">
                            <img src="https://cdn-icons-png.flaticon.com/512/2822/2822359.png" class="w-20 h-20 opacity-40 mx-auto" alt="Empty">
                        </div>
                        <h3 class="text-[16px] font-medium text-gray-900 mb-1">No hay cursos registrados</h3>
                        <p class="text-sm text-gray-400 mb-6">Registrar un curso</p>
                        <a href="{{ route('instructor.nuevo-curso') }}" style="background-color: #00a878;" class="px-6 py-2 text-white rounded-md text-sm font-bold shadow-sm hover:opacity-90 transition">
                            Crear nuevo curso
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>