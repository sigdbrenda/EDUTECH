<x-app-layout>
    <div class="flex min-h-screen bg-[#f5f7f9]" x-data="{ tab: 'informacion' }">
        <aside class="w-64 bg-white border-r border-gray-200 p-6">
            <nav class="space-y-8">
                <div>
                    <h3 class="text-xs font-semibold text-gray-500 uppercase mb-4">Creación de cursos</h3>
                    <ul class="space-y-4">
    
                        <li>
                            <button @click="tab = 'informacion'" 
                                    class="flex items-center w-full transition group"
                                    :class="tab === 'informacion' ? 'text-[#00c471] font-bold' : 'text-gray-400 hover:text-gray-600'">
                                <span :class="tab === 'informacion' ? 'border-[#00c471] bg-[#e6f9f1]' : 'border-gray-200'"
                                    class="w-8 h-8 rounded-full border-2 flex items-center justify-center mr-3 text-xs transition-colors">
                                    1
                                </span>
                                Información del curso
                            </button>
                        </li>

                        <li>
                            <button @click="tab = 'curriculum'" 
                                    class="flex items-center w-full transition group"
                                    :class="tab === 'curriculum' ? 'text-[#00c471] font-bold' : 'text-gray-400 hover:text-gray-600'">
                                <span :class="tab === 'curriculum' ? 'border-[#00c471] bg-[#e6f9f1]' : 'border-gray-200'"
                                    class="w-8 h-8 rounded-full border-2 flex items-center justify-center mr-3 text-xs transition-colors">
                                    2
                                </span>
                                Plan de estudios
                            </button>
                        </li>

                        {{-- Botón 3: Precio y Portada --}}
                        <li>
                            <button @click="tab = 'precio_portada'" 
                                    class="flex items-center w-full transition group"
                                    :class="tab === 'precio_portada' ? 'text-[#00c471] font-bold' : 'text-gray-400 hover:text-gray-600'">
                                <span :class="tab === 'precio_portada' ? 'border-[#00c471] bg-[#e6f9f1]' : 'border-gray-200'"
                                    class="w-8 h-8 rounded-full border-2 flex items-center justify-center mr-3 text-xs transition-colors">
                                    3
                                </span>
                                Precio y Portada
                            </button>
                        </li>
                    </ul>
                </div>
            </nav>
        </aside>

        <main class="flex-1 p-10">
            <div class="max-w-4xl mx-auto">
                <form method="POST" action="{{ route('courses.update', $course) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div x-show="tab === 'informacion'" x-cloak class="animate-fadeIn">
                            <h1 class="text-2xl font-bold mb-8">Información del curso</h1>

                            <div class="bg-white p-8 rounded-xl border border-gray-200 shadow-sm">
                                <div class="mb-6">
                                    <label class="block text-sm font-bold mb-2">Título del curso <span class="text-red-500">*</span></label>
                                    <input type="text" name="title" value="{{ $course->title }}" class="w-full border-gray-300 rounded-lg">
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-bold mb-2">
                                        Resumen del curso <span class="text-red-500">*</span>
                                    </label>
                                    <textarea name="summary" 
                                            class="w-full border-gray-300 rounded-lg focus:ring-[#00c471] focus:border-[#00c471]" 
                                            rows="4" 
                                            placeholder="Escriba una introducción sobre el curso..."></textarea>
                                </div>
                                <div class="mt-8 bg-white p-8 rounded-xl border border-gray-200 shadow-sm">
                                    <label class="block text-sm font-bold mb-2">Descripción detallada del curso <span class="text-red-500">*</span></label>
                                    <textarea name="description" 
                                            class="w-full border-gray-300 rounded-lg focus:ring-[#00c471] focus:border-[#00c471]" 
                                            rows="6" 
                                            placeholder="Escriba aquí todo el contenido detallado del curso...">{{ $course->description }}</textarea>
                                </div>                            
                            </div>

                            <div class="bg-white p-8 rounded-xl border border-gray-200 shadow-sm" 
                                x-data="{ 
                                    categoriaSeleccionada: 'programacion',
                                    seleccionadas: [],
                                    opciones: {
                                        'programacion': [
                                            {id: 1, name: 'Desarrollo Web'}, 
                                            {id: 9, name: 'Back-end'}, 
                                            {id: 10, name: 'Lenguajes'},
                                            {id: 7, name: 'Algoritmos'},
                                            {id: 8, name: 'Móvil'}
                                        ],
                                        'ia': [
                                            {id: 2, name: 'NPL'}, 
                                            {id: 3, name: 'Visión Artificial'}, 
                                            {id: 11, name: 'Aprendizaje Profundo'},
                                            {id: 4, name: 'Agentes IA'},
                                            {id: 5, name: 'Robotica'}
                                        ], 
                                        'diseno': [
                                            {id: 6, name: 'UX/UI'}, 
                                            {id: 12, name: 'Diseño Web'}, 
                                            {id: 14, name: 'Ilustración Digital'},
                                            {id: 15, name: 'Branding'},
                                            {id: 13, name: 'Animación 2D'}
                                        ],
                                        'marketing': [
                                            {id: 16, name: 'SEO'}, 
                                            {id: 17, name: 'SEM'}, 
                                            {id: 18, name: 'Redes Sociales'},
                                            {id: 20, name: 'Copywriting'},
                                            {id: 19, name: 'Email Marketing'}
                                        ],
                                        'datos': [
                                            {id: 22, name: 'Big Data'}, 
                                            {id: 24, name: 'Visualización'}, 
                                            {id: 25, name: 'Minería de Datos'},
                                            {id: 23, name: 'Estadística'},
                                            {id: 26, name: 'SQL Avanzado'}
                                        ],

                                    },
                                    toggleSeleccion(opcion) {
                                        // Buscamos si el ID ya existe en nuestra lista de seleccionadas
                                        if (this.seleccionadas.some(s => s.id === opcion.id)) {
                                            this.seleccionadas = this.seleccionadas.filter(s => s.id !== opcion.id);
                                        } else if (this.seleccionadas.length < 3) {
                                            this.seleccionadas.push(opcion);
                                        }
                                    }
                                }">
                                
                                <label class="block text-sm font-bold mb-6">Seleccione hasta 3 categorías apropiadas para el curso <span class="text-red-500">*</span></label>

                                <div class="flex space-x-8">
                                    <div class="w-1/3 border-r border-gray-100 pr-4 space-y-1">
                                        <template x-for="(items, cat) in opciones">
                                            <button type="button" 
                                                    @click="categoriaSeleccionada = cat" 
                                                    :class="categoriaSeleccionada === cat ? 'bg-[#e6f9f1] text-[#00c471] font-bold' : 'text-gray-600'"
                                                    class="w-full text-left px-4 py-3 rounded-lg text-sm transition flex items-center justify-between">
                                                <span x-text="cat.charAt(0).toUpperCase() + cat.slice(1)"></span>
                                            </button>
                                        </template>
                                    </div>

                                    <div class="w-2/3 grid grid-cols-2 gap-3 content-start">
                                        <template x-for="opcion in opciones[categoriaSeleccionada]">
                                            <button type="button" 
                                                    @click="toggleSeleccion(opcion)"
                                                    :class="seleccionadas.some(s => s.id === opcion.id) ? 'border-[#00c471] bg-green-50 text-[#00c471] font-bold' : 'border-gray-200 text-gray-500 hover:border-[#00c471]'"
                                                    class="border p-3 rounded-xl text-xs flex justify-between items-center transition group">
                                                
                                                <span x-text="opcion.name"></span> {{-- IMPORTANTE: Poner .name aquí --}}
                                                
                                                <span :class="seleccionadas.some(s => s.id === opcion.id) ? 'bg-[#00c471] text-white' : 'bg-gray-100 text-gray-400'" 
                                                    class="w-5 h-5 rounded-full flex items-center justify-center transition-colors">
                                                    <span x-text="seleccionadas.some(s => s.id === opcion.id) ? '✓' : '+' "></span>
                                                </span>
                                            </button>
                                        </template>
                                    </div>
                                
                                    <template x-for="sel in seleccionadas">
                                        <input type="hidden" name="categories[]" :value="sel.id">
                                    </template>
                                </div>

                                <div class="mt-8 pt-6 border-t border-gray-100">
                                    <p class="text-xs font-bold text-gray-400 uppercase mb-3">Tu selección actual:</p>
                                    <div class="flex flex-wrap gap-2">
                                        <template x-for="sel in seleccionadas">
                                            <span class="inline-flex items-center px-3 py-1 bg-[#00c471] text-white text-xs font-bold rounded-full">
                                                <span x-text="sel.name"></span>
                                                <button @click="toggleSeleccion(sel)" class="ml-2 hover:text-red-200">×</button>
                                            </span>
                                        </template>
                                        <p x-show="seleccionadas.length === 0" class="text-xs text-gray-400 italic">No has seleccionado ninguna categoría aún.</p>
                                    </div>
                                </div>
                            </div>

                                <div class="bg-white p-8 rounded-xl border border-gray-200 shadow-sm mt-8" x-data="{ nivel: 'principiante' }">
                                    <label class="block text-sm font-bold mb-2">Nivel del curso <span class="text-red-500">*</span></label>
                                    <p class="text-xs text-gray-400 mb-6">Por favor marque el nivel apropiado para el curso</p>

                                    <div class="grid grid-cols-3 gap-4">
                                        <label :class="nivel === 'principiante' ? 'border-[#00c471] bg-green-50' : 'border-gray-200'" 
                                            class="relative border-2 p-4 rounded-xl cursor-pointer transition-all group">
                                            <input type="radio" name="level" value="principiante" x-model="nivel" class="hidden">
                                            <div class="flex items-center">
                                                <div :class="nivel === 'principiante' ? 'bg-[#00c471] border-[#00c471]' : 'border-gray-300'" 
                                                    class="w-5 h-5 border-2 rounded-full mr-3 flex items-center justify-center transition-colors">
                                                    <div x-show="nivel === 'principiante'" class="w-2 h-2 bg-white rounded-full"></div>
                                                </div>
                                                <div>
                                                    <p :class="nivel === 'principiante' ? 'text-[#00c471]' : 'text-gray-700'" class="font-bold text-sm">Principiante</p>
                                                    <p class="text-[10px] text-gray-400">Sin conocimientos previos</p>
                                                </div>
                                            </div>
                                        </label>

                                        <label :class="nivel === 'basico' ? 'border-[#00c471] bg-green-50' : 'border-gray-200'" 
                                            class="relative border-2 p-4 rounded-xl cursor-pointer transition-all group">
                                            <input type="radio" name="level" value="basico" x-model="nivel" class="hidden">
                                            <div class="flex items-center">
                                                <div :class="nivel === 'basico' ? 'bg-[#00c471] border-[#00c471]' : 'border-gray-300'" 
                                                    class="w-5 h-5 border-2 rounded-full mr-3 flex items-center justify-center transition-colors">
                                                    <div x-show="nivel === 'basico'" class="w-2 h-2 bg-white rounded-full"></div>
                                                </div>
                                                <div>
                                                    <p :class="nivel === 'basico' ? 'text-[#00c471]' : 'text-gray-700'" class="font-bold text-sm">Básico</p>
                                                    <p class="text-[10px] text-gray-400">Requiere conocimientos previos</p>
                                                </div>
                                            </div>
                                        </label>

                                        <label :class="nivel === 'intermedio' ? 'border-[#00c471] bg-green-50' : 'border-gray-200'" 
                                            class="relative border-2 p-4 rounded-xl cursor-pointer transition-all group">
                                            <input type="radio" name="level" value="intermedio" x-model="nivel" class="hidden">
                                            <div class="flex items-center">
                                                <div :class="nivel === 'intermedio' ? 'bg-[#00c471] border-[#00c471]' : 'border-gray-300'" 
                                                    class="w-5 h-5 border-2 rounded-full mr-3 flex items-center justify-center transition-colors">
                                                    <div x-show="nivel === 'intermedio'" class="w-2 h-2 bg-white rounded-full"></div>
                                                </div>
                                                <div>
                                                    <p :class="nivel === 'intermedio' ? 'text-[#00c471]' : 'text-gray-700'" class="font-bold text-sm">Intermedio</p>
                                                    <p class="text-[10px] text-gray-400">Mejora la experiencia</p>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="bg-white p-8 rounded-xl border border-gray-200 shadow-sm mt-8" 
                                    x-data="{ 
                                        items: ['php', 'laragon'], 
                                        nuevoItem: '',
                                        addItem() {
                                            if (this.nuevoItem.trim() !== '') {
                                                this.items.push(this.nuevoItem);
                                                this.nuevoItem = '';
                                            }
                                        },
                                        removeItem(index) {
                                            this.items.splice(index, 1);
                                        }
                                    }">
                                    <label class="block text-sm font-bold mb-4">Lo que aprenderán los estudiantes. (Mínimo 2 elementos) <span class="text-red-500">*</span></label>
                                    
                                    <div class="space-y-3">
                                        <template x-for="(item, index) in items" :key="index">
                                            <div class="flex items-center space-x-3 mb-2">
                                                <div class="flex-1 bg-white border border-gray-200 rounded-lg p-3 shadow-sm flex items-center">
                                                    
                                                    {{-- ESTA LÍNEA ES EL MOTOR: Envía el dato al controlador --}}
                                                    <input type="hidden" name="learning_outcomes[]" :value="item">
                                                    
                                                    <span x-text="item" class="text-sm text-gray-600"></span>
                                                    
                                                    <button type="button" @click="removeItem(index)" class="ml-auto text-red-400">×</button>
                                                </div>
                                            </div>
                                        </template>
                                    </div>

                                    <div class="mt-4 flex items-center space-x-2">
                                        <input type="text" x-model="nuevoItem" @keydown.enter.prevent="addItem()"
                                            placeholder="Escriba una habilidad..." 
                                            class="flex-1 py-2 px-4 border border-dashed border-gray-300 rounded-lg text-sm italic focus:border-[#00c471] focus:ring-0">
                                        
                                        <button type="button" @click="addItem()" class="flex items-center px-4 py-2 text-sm font-bold text-gray-600 hover:text-[#00c471] transition group">
                                            <span class="w-6 h-6 border-2 border-gray-300 rounded-full flex items-center justify-center mr-2 group-hover:border-[#00c471]">+</span>
                                            Agregar
                                        </button>
                                    </div>
                                </div>

                            <div class="flex justify-end mt-8">
                                    <button type="submit" class="bg-[#00c471] text-white px-8 py-3 rounded-lg font-bold shadow-md hover:opacity-90 transition">
                                        Guardar
                                    </button>
                            </div>
                    </div>
            

                    <div x-show="tab === 'curriculum'" x-cloak class="animate-fadeIn">
                            <h1 class="text-2xl font-bold mb-8">Plan de estudios</h1>
                        <div x-data="{ openModal: false }">    
                            <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm mb-8 flex justify-between items-center">
                                    <div>
                                        <p class="font-bold text-gray-800">¡Espera! ¿Ya tienes los vídeos preparados?</p>
                                        <p class="text-xs text-gray-400">Puede completar rápidamente el plan de estudios utilizando [Carga por lotes].</p>
                                    </div>
                                    <button @click="openModal = true" type="button" class="px-4 py-2 border border-gray-300 rounded-lg text-xs font-bold hover:bg-gray-50 flex items-center transition">
                                        <span class="mr-2">☁️</span> Carga por lotes
                                    </button>
                            </div>
                            <div x-show="openModal" 
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0"
                                    x-transition:enter-end="opacity-100"
                                    class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm"
                                    x-cloak>
                                    
                                    <div @click.away="openModal = false" class="bg-white w-full max-w-2xl rounded-2xl shadow-2xl overflow-hidden animate-fadeIn">
                                        <div class="flex justify-between items-center p-6 border-b">
                                            <h3 class="text-xl font-bold text-gray-800">Carga de vídeo por lotes</h3>
                                            <button @click="openModal = false" class="text-gray-400 hover:text-gray-600">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                            </button>
                                        </div>

                                        <div class="p-10">
                                            <div class="border-2 border-dashed border-gray-200 rounded-2xl p-12 flex flex-col items-center justify-center text-center hover:border-[#00c471] hover:bg-green-50/50 transition cursor-pointer group">
                                                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-6 group-hover:bg-[#00c471]/10">
                                                    <svg class="w-8 h-8 text-gray-400 group-hover:text-[#00c471]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                                    </svg>
                                                </div>
                                                <p class="text-gray-600 font-medium mb-2">Arrastre los archivos aquí o haga clic.</p>
                                                <p class="text-[11px] text-gray-400 leading-relaxed max-w-xs">
                                                    Tamaño máximo de archivo 5 GB, solo se permiten archivos en formato .mp4, .mkv, .m4v, .mov, resolución mínima 720p o superior
                                                </p>
                                                <input type="file" multiple class="hidden">
                                            </div>
                                        </div>
                                    </div>
                            </div>  
                        </div>       

                        <div class="bg-gray-50 p-8 rounded-xl" 
                            x-data="{ 
                                // CARGA DINÁMICA: Si existen datos en la BD, los convierte a JSON para Alpine.
                                // Si no, inicializa con una estructura vacía.
                                secciones: {{ $course->sections->count() > 0 
                                    ? $course->sections->map(function($s) {
                                        return [
                                            'id' => $s->id,
                                            'titulo' => $s->title,
                                            'conferencias' => $s->lessons->map(function($l) {
                                                return [
                                                    'id' => $l->id,
                                                    'titulo' => $l->title,
                                                    'publica' => (bool)$l->is_published
                                                ];
                                            })
                                        ];
                                    })->toJson() 
                                    : '[{ id: 1, titulo: \'Sección 1\', conferencias: [{ id: 1, titulo: \'\', publica: true }] }]' 
                                }},
                                
                                editConfModal: false,
                                confActual: { titulo: '' },
                                guardando: false,
                                
                                addSeccion() {
                                    this.secciones.push({
                                        id: Date.now(),
                                        titulo: '',
                                        conferencias: [{ id: Date.now(), titulo: '', publica: true }]
                                    });
                                },

                                addConferencia(sIndex) {
                                    this.secciones[sIndex].conferencias.push({
                                        id: Date.now(),
                                        titulo: '',
                                        publica: true
                                    });
                                },

                                removeConferencia(sIndex, cIndex) {
                                    this.secciones[sIndex].conferencias.splice(cIndex, 1);
                                },

                                abrirEdicion(conf) {
                                    this.confActual = conf;
                                    this.editConfModal = true;
                                },
                                
                                async guardarPlanEstudios() {
                                    this.guardando = true;
                                    try {
                                        const response = await fetch('/instructor/cursos/{{ $course->id }}/guardar-plan', {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                            },
                                            body: JSON.stringify({ secciones: this.secciones })
                                        });

                                        if (response.ok) {
                                            const result = await response.json();
                                            alert('¡Plan de estudios guardado con éxito!');
                                            // RECARGA NECESARIA: Para que los IDs temporales (Date.now()) 
                                            // se reemplacen por los IDs reales generados por HeidiSQL.
                                            window.location.reload(); 
                                        } else {
                                            alert('Error al guardar. Revisa que la ruta exista en web.php');
                                        }
                                    } catch (error) {
                                        console.error('Error:', error);
                                        alert('Error de conexión con el servidor.');
                                    } finally {
                                        this.guardando = false;
                                    }
                                    
                                }
                            }">
                            
                            <h2 class="text-2xl font-bold mb-6 text-gray-800">Plan de estudios</h2>

                            <template x-for="(seccion, sIndex) in secciones" :key="seccion.id">
                                <div class="bg-white border-l-4 border-[#00c471] rounded-xl shadow-sm p-8 mb-6 animate-fadeIn">
                                    
                                    <div class="flex justify-between items-center mb-4">
                                        <span class="text-[10px] font-bold text-[#00c471] uppercase" x-text="'Sección ' + (sIndex + 1)"></span>
                                        <button @click="secciones.splice(sIndex, 1)" class="text-gray-400 hover:text-red-500 transition">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>

                                    <input type="text" x-model="seccion.titulo" 
                                        placeholder="Título de la sección..."
                                        class="w-full border-0 border-b-2 border-gray-100 focus:border-[#00c471] focus:ring-0 font-bold text-lg p-0 pb-2 mb-8 transition-colors">

                                    <div class="space-y-3 pl-4">
                                        <template x-for="(conf, cIndex) in seccion.conferencias" :key="conf.id">
                                            <div class="flex items-center bg-white border border-gray-100 rounded-xl p-4 shadow-sm group hover:border-[#00c471] transition-all cursor-pointer"
                                                @click="abrirEdicion(conf)">
                                                
                                                <div class="text-gray-300 mr-4 cursor-move">:::</div>
                                                <span class="font-bold text-gray-700 mr-4" x-text="cIndex + 1"></span>

                                                <div class="flex-1">
                                                    <span x-text="conf.titulo || 'Por favor crea la primera conferencia.'" 
                                                        class="text-sm text-gray-600 border-b border-gray-200 pb-1"></span>
                                                </div>

                                                <div class="flex items-center space-x-5 ml-4 text-gray-400">
                                                    <button type="button" class="hover:text-gray-600"><i class="fas fa-lock"></i></button>
                                                    
                                                    <button type="button" @click.stop="abrirEdicion(conf)" class="hover:text-blue-500 transition">
                                                        <i class="fas fa-edit"></i>
                                                    </button>

                                                    <button type="button" @click.stop="removeConferencia(sIndex, cIndex)" class="hover:text-red-500 transition">
                                                        <i class="fas fa-trash"></i>
                                                    </button>

                                                    <div class="flex items-center space-x-2" @click.stop>
                                                        <button type="button" 
                                                                @click="conf.publica = !conf.publica"
                                                                :class="conf.publica ? 'bg-[#00c471]' : 'bg-gray-300'"
                                                                class="relative inline-flex h-5 w-10 items-center rounded-full transition-colors focus:outline-none">
                                                            <span :class="conf.publica ? 'translate-x-5' : 'translate-x-1'"
                                                                class="inline-block h-3 w-3 transform rounded-full bg-white transition-transform"></span>
                                                        </button>
                                                        <span class="text-[10px] font-bold uppercase w-12" 
                                                            :class="conf.publica ? 'text-gray-900' : 'text-gray-400'" 
                                                            x-text="conf.publica ? 'Público' : 'Privado'"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </template>
                                    </div>

                                    <div class="mt-8 flex space-x-3">
                                        <button @click="addConferencia(sIndex)" type="button" class="px-4 py-2 bg-gray-100 text-gray-600 rounded-full text-xs font-bold hover:bg-gray-200 flex items-center transition">
                                            <span class="mr-2">+</span> Añadir conferencia
                                        </button>
                                    </div>
                                </div>
                            </template>

                            <div class="flex justify-center mt-10">
                                <button @click="addSeccion()" class="w-full py-4 border-2 border-dashed border-gray-300 rounded-xl text-gray-400 font-bold hover:border-[#00c471] hover:text-[#00c471] transition-all">
                                    + Agregar sección
                                </button>
                            </div>
                            <div class="flex justify-end mt-12 pt-8 border-t border-gray-200">
                                <button type="button" 
                                        @click="guardarPlanEstudios()" 
                                        class="bg-[#00c471] text-white px-10 py-3 rounded-xl font-bold shadow-lg hover:bg-[#00a35d] transition-all flex items-center justify-center min-w-[200px]">
                                    
                                    <template x-if="!guardando">
                                        <span>Guardar Plan de estudios</span>
                                    </template>

                                    <template x-if="guardando">
                                        <span class="flex items-center">
                                            <svg class="animate-spin h-5 w-5 mr-3 text-white" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"></circle>
                                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                            </svg>
                                            Procesando...
                                        </span>
                                    </template>
                                </button>
                            </div>                  

                            <div x-show="editConfModal" 
                                class="fixed inset-0 z-[999] flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm"
                                x-cloak
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 scale-95"
                                x-transition:enter-end="opacity-100 scale-100">
                                
                                <div @click.away="editConfModal = false" 
                                    class="bg-white w-full max-w-3xl rounded-2xl shadow-2xl overflow-hidden max-h-[90vh] flex flex-col">
                                    
                                    <div class="flex justify-between items-center p-6 border-b">
                                        <h3 class="text-xl font-bold text-gray-800">Edición de la conferencia</h3>
                                        <button @click="editConfModal = false" class="text-gray-400 hover:text-gray-600 text-2xl font-bold">&times;</button>
                                    </div>                       
                                    <div class="p-8 overflow-y-auto space-y-6" x-data="{ videoNombre: '', materialNombre: '' }">
                                        <div>
                                            <label class="block text-sm font-bold text-gray-700 mb-2">Título de la conferencia</label>
                                            <input type="text" x-model="confActual.titulo" 
                                                class="w-full border-gray-200 rounded-xl focus:ring-[#00c471] focus:border-[#00c471]">
                                        </div>

                                        <div class="space-y-2">
                                            <div class="flex justify-between items-center">
                                                <label class="text-sm font-bold text-gray-700">Subir vídeo</label>
                                                
                                                <input type="file" id="inputVideoIndividual" class="hidden" accept="video/*"
                                                    @change="videoNombre = $event.target.files[0].name">
                                                
                                                <button type="button" @click="document.getElementById('inputVideoIndividual').click()"
                                                        class="text-xs font-bold border border-gray-300 px-3 py-1 rounded-lg hover:bg-gray-50 flex items-center transition">
                                                    <span class="mr-1">↑</span> Nueva carga
                                                </button>
                                            </div>

                                            <div class="border-2 border-dashed border-gray-100 rounded-xl p-12 text-center bg-gray-50 group hover:border-[#00c471] transition-colors cursor-pointer"
                                                @click="document.getElementById('inputVideoIndividual').click()">
                                                
                                                <p class="text-sm font-medium" :class="videoNombre ? 'text-[#00c471]' : 'text-gray-400'"
                                                x-text="videoNombre ? 'Video seleccionado: ' + videoNombre : 'Aún no se ha subido ningún vídeo'">
                                                </p>
                                                <p class="text-[11px] text-gray-300 mt-1" x-show="!videoNombre">
                                                    Máximo 5 GB ( solo .mp4, .mkv, .m4v, .mov ), mínimo 720p o superior
                                                </p>
                                            </div>
                                        </div>

                                        <div>
                                            <label class="block text-sm font-bold text-gray-700 mb-2">Cargar materiales del curso</label>
                                            
                                            <input type="file" id="inputMaterialIndividual" class="hidden"
                                                @change="materialNombre = $event.target.files[0].name">

                                            <div @click="document.getElementById('inputMaterialIndividual').click()"
                                                class="flex items-center w-full border border-gray-200 rounded-xl p-3 text-sm italic cursor-pointer hover:border-[#00c471] transition-all"
                                                :class="materialNombre ? 'text-gray-800 bg-green-50' : 'text-gray-400'">
                                                <span class="mr-2">↑</span>
                                                <span x-text="materialNombre ? materialNombre : 'Seleccionar archivo'"></span>
                                            </div>
                                            <p class="text-[10px] text-gray-400 mt-1 ml-1">Límite máximo de 2 GB</p>
                                        </div>

                                        <div>
                                            <label class="block text-sm font-bold text-gray-700 mb-2">Escribir notas de clase</label>
                                            <div class="border border-gray-200 rounded-xl overflow-hidden focus-within:border-[#00c471] transition-colors">
                                                <div class="bg-gray-50 p-2 border-b flex space-x-4 text-gray-400 text-xs">
                                                    <span class="font-bold cursor-pointer hover:text-[#00c471]">B</span> 
                                                    <i class="cursor-pointer hover:text-[#00c471]">I</i> 
                                                    <u class="cursor-pointer hover:text-[#00c471]">U</u> 
                                                    <span class="cursor-pointer hover:text-[#00c471]">🔗</span> 
                                                    <span class="cursor-pointer hover:text-[#00c471]">🖼️</span>
                                                    <span class="text-gray-300">|</span>
                                                    <span class="cursor-pointer hover:text-[#00c471]">H1</span>
                                                    <span class="cursor-pointer hover:text-[#00c471]">H2</span>
                                                </div>
                                                <textarea x-model="confActual.notas" rows="4" 
                                                        class="w-full border-none focus:ring-0 text-sm p-4" 
                                                        placeholder="Try writing a Lecture Note."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="p-6 border-t bg-gray-50 flex justify-end space-x-4">
                                        <button @click="editConfModal = false" class="px-6 py-2 border border-gray-300 rounded-lg text-sm font-bold text-gray-600 hover:bg-gray-100 transition">
                                            Cancelar
                                        </button>
                                        <button class="px-6 py-2 bg-[#00c471] text-white rounded-lg text-sm font-bold shadow-md hover:opacity-90 transition">
                                            Guardar
                                        </button>
                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div>
                    {{-- Pestaña 3: Precio y Portada --}}
                    <div x-show="tab === 'precio_portada'" x-cloak class="animate-fadeIn">
                        <h1 class="text-2xl font-bold mb-8">Precio y Portada del curso</h1>

                        <div class="bg-white p-8 rounded-xl border border-gray-200 shadow-sm space-y-8">
                            {{-- Input de Precio --}}
                            <div>
                                <label class="block text-sm font-bold mb-2">Precio del curso (S/)</label>
                                <input type="number" name="price" value="{{ $course->price }}" step="0.01" 
                                    class="w-full border-gray-300 rounded-lg focus:ring-[#00c471] focus:border-[#00c471]" 
                                    placeholder="0.00">
                            </div>

                            {{-- Input de Imagen con Preview --}}
                            <div x-data="{ photoPreview: null }">
                                <label class="block text-sm font-bold mb-2">Imagen de portada</label>
                                <div class="mt-2 flex items-center space-x-6">
                                    <div class="shrink-0">
                                        <img x-show="!photoPreview" 
                                            src="{{ $course->image_path ? asset('storage/' . $course->image_path) : asset('img/default.jpg') }}" 
                                            class="h-32 w-48 object-cover rounded-xl border">
                                        <img x-show="photoPreview" :src="photoPreview" class="h-32 w-48 object-cover rounded-xl border" style="display: none;">
                                    </div>
                                    <input type="file" name="image" x-ref="image" accept="image/*"
                                        @change="
                                            const reader = new FileReader();
                                            reader.onload = (e) => { photoPreview = e.target.result; };
                                            reader.readAsDataURL($event.target.files[0]);
                                        ">
                                    <button type="button" @click="$refs.image.click()" class="px-4 py-2 border rounded-lg text-sm font-bold">Subir imagen</button>
                                </div>
                            </div>

                            <div class="flex justify-end mt-10 pt-6 border-t border-gray-100">
                                <button type="submit" 
                                        class="bg-[#00c471] text-white px-10 py-3 rounded-xl font-bold shadow-lg hover:bg-[#00a35d] transition-all flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    Guardar Precio y Portada
                                </button>
                            </div>                    
                        </div>
                    </div>
                </form>    
            </div>    
        </main>
    </div>

    </div> 
        <style>
            [x-cloak] { display: none !important; }
            .animate-fadeIn { animation: fadeIn 0.3s ease-in-out; }
            @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        </style>
    </div>    

</x-app-layout>