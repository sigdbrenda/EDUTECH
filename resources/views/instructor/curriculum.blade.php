<div class="bg-gray-50 p-8 rounded-xl" 
     x-data="{ 
        secciones: [
            { id: 1, titulo: 'Sección 1', conferencias: [{ id: 1, titulo: '', publica: true }] }
        ],
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
                    alert('¡Plan de estudios guardado con éxito!');
                } else {
                    alert('Error 404: La ruta no existe en web.php');
                }
            } catch (error) {
                console.error('Error:', error);
            } finally {
                this.guardando = false;
            }
        }
     }">
    
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Plan de estudios</h2>

    <template x-for="(seccion, sIndex) in secciones" :key="seccion.id">
        <div class="bg-white border-l-4 border-[#00c471] rounded-xl shadow-sm p-8 mb-6">
            <input type="text" x-model="seccion.titulo" placeholder="Título de la sección..."
                class="w-full border-0 border-b-2 border-transparent focus:border-[#00c471] focus:ring-0 font-bold text-xl p-0 mb-6">

            <div class="space-y-3">
                <template x-for="(conf, cIndex) in seccion.conferencias" :key="conf.id">
                    <div class="flex items-center bg-white border border-gray-100 rounded-xl p-4 shadow-sm hover:border-[#00c471] transition-all">
                        <span class="font-bold text-gray-700 mr-4" x-text="cIndex + 1"></span>
                        <input type="text" x-model="conf.titulo" placeholder="Nombre de la conferencia..." class="flex-1 border-0 focus:ring-0 text-sm">
                        <button type="button" @click="abrirEdicion(conf)" class="text-gray-400 hover:text-blue-500 ml-4">📝</button>
                    </div>
                </template>
            </div>

            <button @click="addConferencia(sIndex)" class="mt-6 px-4 py-2 bg-gray-100 text-gray-600 rounded-full text-xs font-bold hover:bg-gray-200">
                + Añadir conferencia
            </button>
        </div>
    </template>

    <button @click="addSeccion()" class="w-full py-4 border-2 border-dashed border-gray-200 rounded-xl text-gray-400 font-bold hover:border-[#00c471] hover:text-[#00c471] transition-all">
        + Agregar sección
    </button>

    <div class="flex justify-end mt-12 pt-8 border-t border-gray-200">
        <button type="button" 
                @click="guardarPlanEstudios()" 
                class="bg-[#00c471] text-white px-10 py-3 rounded-xl font-bold shadow-lg hover:opacity-90 flex items-center">
            <span x-show="!guardando">Guardar Plan de estudios</span>
            <span x-show="guardando">Guardando...</span>
        </button>
    </div>
</div>