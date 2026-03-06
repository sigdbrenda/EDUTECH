<x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen" x-data="{ metodo: '' }">
        <div class="max-w-5xl mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <div class="md:col-span-2 bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                <h2 class="text-3xl font-bold mb-8 text-gray-800 italic">¿Cómo quieres pagar?</h2>
                
                <div class="space-y-4 mb-10">
                    {{-- Botón Tarjeta --}}
                    <button @click="metodo = 'tarjeta'" 
                        :class="metodo === 'tarjeta' ? 'border-purple-500 bg-purple-50' : 'border-gray-100'"
                        class="w-full flex justify-between items-center p-5 border-2 rounded-2xl transition-all duration-300 group">
                        <div class="flex items-center space-x-4 text-gray-700">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRmf5rQoOt87qU25VDboIWw9KtxP0rfs6XSqw&s" class="h-6">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg" class="h-6">
                            <span class="font-semibold text-lg ml-2">Tarjeta de crédito o débito</span>
                        </div>
                        <svg class="w-6 h-6 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </button>

                    {{-- Botón PayPal --}}
                    <button @click="metodo = 'paypal'"
                        :class="metodo === 'paypal' ? 'border-blue-500 bg-blue-50' : 'border-gray-100'"
                        class="w-full flex justify-between items-center p-5 border-2 rounded-2xl transition-all duration-300 group">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" class="h-8">
                        <svg class="w-6 h-6 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </button>

                    {{-- Botón Yape/Plin (ACTUALIZADO) --}}
                    <button @click="metodo = 'yape'"
                        :class="metodo === 'yape' ? 'border-[#00d19d] bg-teal-50' : 'border-gray-100'"
                        class="w-full flex justify-between items-center p-5 border-2 rounded-2xl transition-all duration-300 group">
                        <div class="flex items-center space-x-3">
                            <div class="flex space-x-1">
                            <img src="https://play-lh.googleusercontent.com/y5S3ZIz-ohg3FirlISnk3ca2yQ6cd825OpA0YK9qklc5W8MLSe0NEIEqoV-pZDvO0A8" class="h-8">
                            <img src="https://images.seeklogo.com/logo-png/43/3/plin-logo-png_seeklogo-434340.png" class="h-8">
                            <img src="https://images.seeklogo.com/logo-png/39/1/tunki-logo-png_seeklogo-390757.png" class="h-8">
                            </div>
                            <span class="font-semibold text-gray-700 text-lg">Yape, Plin o Tunki</span>
                        </div>
                        <svg class="w-6 h-6 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </button>
                </div>

                <div class="mt-8 min-h-[300px] border-2 border-transparent rounded-3xl p-4 transition-all"
                     :class="metodo !== '' ? 'border-gray-50 bg-gray-50/30' : ''">
                    
                    {{-- PESTAÑA: YAPE / PLIN (Igual a tu imagen) --}}
                    <div x-show="metodo === 'yape'" x-transition:enter class="space-y-6">
                        <div class="flex space-x-2 mb-4">
                            <img src="https://play-lh.googleusercontent.com/y5S3ZIz-ohg3FirlISnk3ca2yQ6cd825OpA0YK9qklc5W8MLSe0NEIEqoV-pZDvO0A8" class="h-8">
                            <img src="https://images.seeklogo.com/logo-png/43/3/plin-logo-png_seeklogo-434340.png" class="h-8">
                            <img src="https://images.seeklogo.com/logo-png/39/1/tunki-logo-png_seeklogo-390757.png" class="h-8">
                        </div>
                        
                        <h3 class="text-xl font-bold text-gray-800">Realiza tu pago desde tu aplicación de Yape</h3>
                        <p class="text-sm text-gray-600 leading-relaxed">
                            Después de ingresar tu correo electrónico, se generará el código QR que podrás pagar con la aplicación de Yape. Recuerda que la confirmación de tu compra se notificará al correo electrónico que ingreses a continuación:
                        </p>

                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-bold text-gray-800 mb-2">Correo electrónico</label>
                                <div class="relative">
                                    <input type="email" placeholder="nombre@ejemplo.com" 
                                           class="w-full p-4 border-gray-300 rounded-xl focus:ring-[#00d19d] focus:border-[#00d19d] transition shadow-sm">
                                    <span class="absolute right-4 top-1/2 -translate-y-1/2 text-green-500">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                    </span>
                                </div>
                            </div>

                            <div class="space-y-3">
                                <label class="flex items-start cursor-pointer group text-sm text-gray-600">
                                    <input type="checkbox" checked class="mt-1 rounded text-[#00d19d] border-gray-300 focus:ring-[#00d19d] mr-3">
                                    <span>Acepto expresamente todos los <span class="text-teal-600 font-medium">Términos y condiciones</span></span>
                                </label>
                                
                                <label class="flex items-start cursor-pointer group text-sm text-gray-600">
                                    <input type="checkbox" class="mt-1 rounded text-[#00d19d] border-gray-300 focus:ring-[#00d19d] mr-3">
                                    <span>Autorizo que EduTech use los datos proporcionados para contactarme y recibir promociones.</span>
                                </label>
                            </div>

                            {{-- BOTÓN GENERAR QR ESTILIZADO (Igual a la imagen) --}}
                            <button @click="alert('Generando QR...')" 
                                    class="w-full bg-[#1ae195] text-white py-4 rounded-xl font-bold text-lg flex items-center justify-center space-x-2 hover:bg-[#17c984] transition shadow-lg">
                                {{-- Icono de Escudo con Check --}}
                                <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 22C12 22 20 18 20 12V5L12 2L4 5V12C4 18 12 22 12 22Z" fill="white" fill-opacity="0.2" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M9 12L11 14L15 10" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <span>Generar QR</span>
                            </button>
                        </div>
                    </div>

                    {{-- VISTA PAYPAL --}}
                    <div x-show="metodo === 'paypal'" x-transition class="space-y-6">
                        <div class="flex items-center space-x-2">
                             <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" class="h-6">
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Inicia sesión con tu cuenta de Paypal</h3>
                        <p class="text-gray-600">Para seguir con tu compra inicia sesión con tu cuenta de Paypal para autorizar el pago de **S/ {{ number_format($course->price, 2) }}**.</p>
                        
                        <div class="space-y-3">
                            <label class="flex items-center text-sm text-gray-600 cursor-pointer">
                                <input type="checkbox" checked class="rounded text-blue-600 mr-3 border-gray-300">
                                <span>Acepto los términos y condiciones.</span>
                            </label>
                        </div>

                        {{-- BOTÓN DE ACCIÓN --}}
                        <a href="{{ route('courses.process_payment', $course) }}" 
                           class="w-full bg-[#0070ba] text-white py-4 rounded-xl font-bold text-lg flex items-center justify-center space-x-2 hover:bg-[#005ea6] transition shadow-lg">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" class="h-8 brightness-0 invert">
                        </a>
                    </div>

                    {{-- PESTAÑA: TARJETA --}}
                    <div x-show="metodo === 'tarjeta'" x-transition:enter class="space-y-6">
                        <h3 class="text-xl font-bold text-gray-800">Detalles de Facturación</h3>
                        <div class="space-y-4">
                            <input type="text" placeholder="Número de Tarjeta" class="w-full p-4 border-gray-300 rounded-xl">
                            <div class="grid grid-cols-2 gap-4">
                                <input type="text" placeholder="MM/AA" class="p-4 border-gray-300 rounded-xl">
                                <input type="text" placeholder="CVC" class="p-4 border-gray-300 rounded-xl">
                            </div>
                            {{-- Botón Comprar Ahora con estilo de Generar QR --}}
                            <a href="{{ route('courses.process_payment', $course) }}" 
                            class="w-full bg-[#1ae195] text-white py-4 rounded-xl font-bold text-lg flex items-center justify-center space-x-2 hover:bg-[#17c984] transition shadow-lg shadow-teal-100">
                                
                                {{-- Icono de Escudo con Check (Mismo estilo que Yape) --}}
                                <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 22C12 22 20 18 20 12V5L12 2L4 5V12C4 18 12 22 12 22Z" fill="white" fill-opacity="0.2" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M9 12L11 14L15 10" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>

                                <span>Comprar ahora</span>
                            </a>
                        </div>
                    </div>

                    {{-- ESTADO INICIAL --}}
                    <div x-show="metodo === ''" class="flex flex-col items-center justify-center py-12">
                        <p class="text-gray-400 italic">Selecciona un método para completar tu compra</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-3xl shadow-sm h-fit sticky top-8 border border-gray-100">
                <img src="{{ $course->image_path ? asset('storage/'.$course->image_path) : asset('img/php.jpg') }}" 
                     class="rounded-2xl mb-4 w-full h-40 object-cover shadow-sm"
                     onerror="this.src='{{ asset('img/php.jpg') }}'">
                <h3 class="font-bold text-xl text-gray-800 mb-1 leading-tight">{{ $course->title }}</h3>
                <p class="text-sm text-gray-400 mb-6 italic">Instructor: {{ $course->teacher->name ?? 'EduTech Team' }}</p>
                
                <div class="border-t pt-4">
                    <div class="flex justify-between font-bold text-gray-900 text-xl">
                        <span>Total</span>
                        <span class="text-pink-600">S/ {{ number_format($course->price, 2) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>