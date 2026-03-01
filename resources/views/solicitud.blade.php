<x-app-layout>
    <div class="py-16 bg-white min-h-screen">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Solicitud de instructor</h2>
                <p class="text-gray-500 text-sm mb-2">Proporcione su perfil e información sobre el curso que planea crear.</p>
            </div>

            <form action="{{ route('instructor.admin') }}" method="GET" class="space-y-10">
                
                <div class="flex flex-col">
                    <label class="block text-[15px] font-bold text-gray-800 mb-2">
                        Nombre completo o nombre de la empresa <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="nombre" value="Brenda Alvarado" 
                           class="w-full border-gray-300 rounded-md focus:ring-1 focus:ring-green-500 focus:border-green-500 py-3 px-4 text-gray-700">
                </div>
                
                <div class="flex flex-col">
                    <label class="block text-[15px] font-bold text-gray-800 mb-2">
                        Número de teléfono de contacto <span class="text-red-500">*</span>
                    </label>
                    <div class="grid grid-cols-1 gap-3">
                        <input type="text" placeholder="Por favor, introduzca su número de teléfono." 
                               class="w-full border-gray-300 rounded-md py-3 px-4">
                    </div>
                </div>

                <div class="flex flex-col">
                    <label class="block text-[15px] font-bold text-gray-800 mb-9">¿Cómo se enteró de EduTech? <span class="text-red-500">*</span>
                </label>
                    <div class="grid grid-cols-2 gap-y-5 gap-x-8">
                        @foreach(['Búsqueda en Internet', 'Redes sociales', 'LinkedIn', 'Publicidad en línea', 'Referencia de conocidos', 'Otro'] as $index => $source)
                            <label class="flex items-center space-x-3 cursor-pointer group">
                                <input type="radio" name="source" class="w-5 h-5 text-green-600 border-gray-300 focus:ring-green-500" {{ $index == 0 ? 'checked' : '' }}>
                                <span class="text-[14px] text-gray-600 group-hover:text-gray-900">{{ $source }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <hr class="border-gray-100 my-4">

                <div class="flex flex-col">
                    <label class="block text-[15px] font-bold text-gray-800 mb-1">
                        Introducción del perfil <span class="text-red-500">*</span>
                    </label>
                    <p class="text-[13px] text-gray-400 mb-5 leading-relaxed">Preséntese, incluyendo su trayectoria profesional y experiencia que pueda resultar de interés para los estudiantes.</p>
                    <textarea rows="5" class="w-full border-gray-300 rounded-md placeholder-gray-300 p-4 focus:ring-green-500 focus:border-green-500" 
                              placeholder="Por ejemplo, he construido mi carrera como desarrollador backend durante 7 años..."></textarea>
                </div>

                <div class="flex flex-col">
                    <label class="block text-[15px] font-bold text-gray-800 mb-5">Tema del curso o área de interés <span class="text-red-500">*</span></label>
                    <div class="grid grid-cols-2 gap-y-5 gap-x-8">
                        @foreach(['Tecnología de IA', 'Programación', 'Ciencia de datos', 'Hardware', 'Diseño', 'Marketing'] as $tema)
                            <label class="flex items-center space-x-3 cursor-pointer group">
                                <input type="radio" name="tema" class="w-5 h-5 text-green-600 border-gray-300 focus:ring-green-500">
                                <span class="text-[14px] text-gray-600 group-hover:text-gray-900">{{ $tema }}</span>
                            </label>
                        @endforeach
                        <label class="flex items-center space-x-3 cursor-pointer group">
                            <input type="radio" name="tema" class="w-5 h-5 text-green-600 border-gray-300 focus:ring-green-500" checked>
                            <span class="text-[14px] text-gray-600 font-medium">No seleccionado</span>
                        </label>
                    </div>
                </div>

                <div class="pt-8">
                    <button type="submit" 
                        style="background-color: #00a84c; color: white;"
                        class="w-full py-4 font-bold rounded-md hover:opacity-90 transition duration-200 uppercase tracking-[2px] text-[12px] shadow-sm">
                            Entregar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>