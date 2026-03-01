<x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-2xl font-bold text-gray-900">Administrar cursos</h1>
                <div class="flex space-x-3">
                    <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-md text-sm font-medium hover:bg-gray-50">
                        Guía del instructor
                    </button>
                    <button style="background-color: #00a878;" class="px-4 py-2 text-white rounded-md text-sm font-bold shadow-sm">
                        Crear nuevo curso
                    </button>
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
            </div>
        </div>
    </div>
</x-app-layout>