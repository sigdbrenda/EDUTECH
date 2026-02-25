<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4" style="color: #1e3a8a;">Cursos Disponibles</h3>
                    <table class="min-w-full border-collapse border border-gray-300">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border border-gray-300 px-4 py-2">Cursos</th>
                                <th class="border border-gray-300 px-4 py-2">Instructor</th>
                                <th class="border border-gray-300 px-4 py-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Laravel Basico</td>
                                <td class="border border-gray-300 px-4 py-2">Juan Pérez</td>
                                <td class="border border-gray-300 px-4 py-2 text-blue-600">Ver detalles</td>
                            </tr>
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">Diseño Web</td>
                                <td class="border border-gray-300 px-4 py-2">Edutech Team</td>
                                <td class="border border-gray-300 px-4 py-2 text-blue-600">Ver detalles</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
