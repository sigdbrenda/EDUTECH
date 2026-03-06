<x-app-layout>
<div class="min-h-screen bg-[#f5f7f9] flex items-center justify-center"
     x-data="{ step: 1, idioma: '', titulo: '' }">

    <div class="w-full max-w-2xl px-6">
        <form action="{{ route('courses.store') }}" method="POST">

            <!-- ================= PASO 1 ================= -->
            <div x-show="step === 1" class="animate-fadeIn text-center">

                <!-- TARJETA VERDE PRINCIPAL -->
                <div class="bg-[#00c471]/10 border border-[#00c471] rounded-3xl p-12 max-w-xl mx-auto shadow-sm">

                    <h1 class="text-3xl font-bold text-gray-800 mb-12">
                        ¡Bienvenido(a), {{ auth()->user()->name }}!
                    </h1>

                    <!-- TARJETA INTERNA BLANCA -->
                    <div class="relative bg-white rounded-2xl p-8 border border-gray-100">

                        <!-- círculo activo -->
                        <div class="absolute top-5 right-5 w-4 h-4 rounded-full bg-[#00c471]"></div>

                        <div class="flex flex-col items-center">

                            <div class="w-14 h-14 rounded-xl bg-[#00c471]/10 flex items-center justify-center mb-5">
                                <svg class="w-8 h-8 text-[#00c471]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </div>

                            <h2 class="text-lg font-semibold mb-4">Curso</h2>

                            <p class="text-sm text-gray-600 leading-relaxed max-w-xs">
                                Un curso en línea que permite a los estudiantes
                                estudiar libremente en su horario preferido.
                            </p>

                            <div class="mt-6 text-xs text-[#00c471] font-semibold space-y-1">
                                <p># Clase siempre activa</p>
                                <p># Clase de video</p>
                            </div>

                        </div>
                    </div>

                </div>
            </div>


            <!-- ================= PASO 2 ================= -->
            <div x-show="step === 2" class="animate-fadeIn">

                <div class="bg-white border border-gray-200 rounded-3xl p-12 shadow-sm max-w-xl mx-auto">

                    <div class="w-14 h-14 rounded-2xl bg-[#e6f9f1] flex items-center justify-center mx-auto mb-8">
                        <span class="text-2xl text-[#00c471]">🌱</span>
                    </div>

                    <h2 class="text-2xl font-bold text-gray-800 mb-4 text-center">
                        Primer paso para compartir conocimientos
                    </h2>

                    <p class="text-gray-400 mb-10 font-medium text-sm text-center">
                        ¡Gracias por su interés en compartir conocimientos en Inlearn!
                    </p>

                    <div class="text-gray-600 text-sm leading-relaxed space-y-6 max-w-md mx-auto text-left">

                        <p>
                            Inlearn valora la experiencia y el esfuerzo detrás de cada curso y
                            <span class="text-[#00c471] font-semibold">
                                ayuda a expandir su alcance a través de estudiantes globales.
                            </span>
                        </p>

                        <p>
                            Comience a crear su curso ahora mismo.
                            Disponemos de una guía paso a paso para ayudarle en cada etapa.
                        </p>

                        <a href="#" class="text-[#00c471] font-semibold hover:underline">
                            Guía para nuevos instructores
                        </a>

                    </div>

                </div>
            </div>

            @csrf

            <!-- ================= PASO 3 ================= -->
            <div x-show="step === 3" class="text-center animate-fadeIn">

                <div class="w-14 h-14 rounded-2xl bg-[#e6f9f1] flex items-center justify-center mx-auto mb-6">
                    <span class="text-xl text-[#00c471]">▶</span>
                </div>

                <h2 class="text-2xl font-bold text-gray-800 mb-2">
                    Introduzca el título del curso.
                </h2>

                <p class="text-gray-400 text-sm font-medium mb-8">
                    No te preocupes demasiado. ¡Puedes editar el título cuando quieras!
                </p>

                <div class="max-w-xl mx-auto space-y-4">

                    <input type="text"
                        name="title" 
                        x-model="titulo"
                        placeholder="Ej: Aprende marketing digital desde cero"
                        class="w-full border border-gray-300 rounded-lg py-4 px-5 focus:ring-2 focus:ring-[#00c471] focus:border-[#00c471] outline-none">

                    <!-- sugerencias -->
                    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden text-left">

                        <div class="p-4 text-sm border-b flex items-center">
                            <span class="mr-3 text-[#00c471]">✨</span>
                            Domina el Diseño Web Paso a Paso
                        </div>

                        <div class="p-4 text-sm border-b flex items-center">
                            <span class="mr-3 text-[#00c471]">✨</span>
                            Aprende Programación Desde Cero
                        </div>

                        <div class="p-4 text-sm flex items-center">
                            <span class="mr-3 text-[#00c471]">✨</span>
                            Curso Completo de Marketing Digital
                        </div>

                    </div>
                </div>
            </div>


            <!-- ================= PASO 4 ================= -->
            <div x-show="step === 4" class="text-center animate-fadeIn">

                <div class="w-14 h-14 rounded-2xl bg-[#e6f9f1] flex items-center justify-center mx-auto mb-6">
                    <span class="text-xl text-[#00c471]">🌐</span>
                </div>

                <h2 class="text-2xl font-bold text-gray-800 mb-2">
                    Seleccione el idioma del curso.
                </h2>

                <p class="text-gray-400 text-sm font-medium mb-8 max-w-md mx-auto">
                    El idioma seleccionado se aplicará como idioma predeterminado
                    para el vídeo y los subtítulos.
                </p>

                <div class="max-w-md mx-auto">

                    <select name="language" x-model="idioma"
                            class="w-full border border-gray-300 rounded-lg py-4 px-4
                                focus:ring-2 focus:ring-[#00c471]
                                focus:border-[#00c471]
                                bg-white">

                        <option value="">Seleccionar idioma</option>
                        <option>Español</option>
                        <option>Inglés</option>
                        <option>Portugués</option>
                        <option>Francés</option>
                        <option>Alemán</option>
                    </select>

                </div>
            </div>


            <!-- ================= INDICADORES ================= -->
            <div class="mt-14 flex flex-col items-center">

                <div class="flex space-x-2 mb-8">
                    <template x-for="i in 4">
                        <div :class="step === i ? 'bg-[#00c471]' : 'bg-gray-300'"
                            class="w-2.5 h-2.5 rounded-full transition-all">
                        </div>
                    </template>
                </div>

                <div class="flex space-x-4">

                    <button x-show="step > 1"
                            type="button"
                            @click="step--"
                            class="px-8 py-3 border border-gray-300 rounded-lg font-semibold text-gray-700 hover:bg-gray-50 transition">
                        Anterior
                    </button>

                    <button x-show="step < 4"
                            type="button"
                            @click="step++"
                            class="px-8 py-3 bg-[#00c471] text-white rounded-lg font-semibold shadow hover:opacity-90 transition">
                        Próximo
                    </button>

                    <button x-show="step === 4"
                            type="submit"
                            class="px-8 py-3 bg-[#00c471] text-white rounded-lg font-semibold shadow hover:opacity-90 transition">
                        Finalizar
                    </button>

                </div>
            </div>
        </form>
    </div>
</div>

<style>
.animate-fadeIn {
    animation: fadeIn .35s ease-in-out;
}
@keyframes fadeIn {
    from { opacity:0; transform:translateY(8px); }
    to { opacity:1; transform:translateY(0); }
}
</style>
</x-app-layout>