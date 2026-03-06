<x-app-layout>
    <div class="py-20 bg-gray-50 min-h-screen flex items-center justify-center">
        <div class="max-w-md w-full bg-white p-8 rounded-3xl shadow-xl text-center border border-green-100">
            {{-- Icono de éxito --}}
            <div class="w-20 h-20 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>

            <h1 class="text-3xl font-extrabold text-gray-900 mb-2">¡Pago Exitoso!</h1>
            <p class="text-gray-500 mb-8">Gracias por confiar en EduTech. Ya tienes acceso completo al curso.</p>

            <div class="bg-gray-50 rounded-2xl p-4 mb-8 flex items-center space-x-4 text-left border border-gray-100">
                <img src="{{ $course->image_path ? asset('storage/'.$course->image_path) : asset('img/php.jpg') }}" 
                     class="w-16 h-16 rounded-lg object-cover">
                <div>
                    <h2 class="font-bold text-gray-800 leading-tight">{{ $course->title }}</h2>
                    <p class="text-xs text-gray-400">Instructor: {{ $course->teacher->name }}</p>
                </div>
            </div>

            <a href="{{ route('catalogo') }}" 
               class="block w-full bg-[#00c471] text-white py-4 rounded-2xl font-bold hover:bg-[#00a35d] transition shadow-lg shadow-green-200">
                Empezar a aprender
            </a>
        </div>
    </div>
</x-app-layout>