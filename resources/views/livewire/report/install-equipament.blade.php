<div>
    <div class="flex my-3 justify-between items-center border-b border-gray-300 border-3">
        <h1 class="mr-5 text-lg font-bold text-gray-800">CONSTANCIAS DE EQUIPOS INSTALADOS</h1>
    </div>
    <table class="rounded-t-lg m-5 w-11/12 mx-auto bg-gray-200 text-gray-800">
        <tr class="text-left border-b-2 border-gray-300">
            <th class="text-center px-2">#</th>
            <th class="px-4">Equipo</th>
            <th class="py-3 text-center">Fecha de Instalación</th>
            <th class="px-4 text-center">Estación</th>
            <th class="py-3 m-auto text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                    <path
                        d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z">
                    </path>
                </svg>
            </th>
        </tr>
        @foreach ($report->installation as $installation)
            <tr class="bg-gray-100 border-b border-gray-200">
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="px-4 py-3 text-sm">{{ $installation->article->denominacion }}</td>
                <td class="text-sm text-center">{{ $installation->fecha_instalacion }}</td>
                <td class="text-sm text-center">{{ $installation->estation->name }}</td>
                <td class="text-center">
                    <abbr title="Ver Constancia">
                        <button wire:click="openModal({{ $installation }})"
                            class="text-gray-500 hover:text-gray-900 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </abbr>
                </td>
            </tr>
        @endforeach
    </table>

    @if ($installog)
        {{-- Modal de Añadir --}}
        <x-jet-dialog-modal wire:model="modal">
            <x-slot name="title">
                <h1>Constancia de Instalacion</h1>
            </x-slot>

            <x-slot name="content">
                <div class="flex justify-between">
                    <div>
                        <h1 class="font-bold text-lg underline">Datos del Equipo</h1>
                        <h1 class="font-bold">Equipo: {{ $installog->article->denominacion }}</h1>
                        <h2 class="font-semibold">Serie: {{ $installog->article->nserie }}</h2>
                        <h2 class="font-semibold">Modelo: {{ $installog->article->modelo }}</h2>
                    </div>
                    <div>
                        <h1 class="font-bold text-lg underline">Datos de la Instalacion</h1>
                        <h1 class="font-bold">Fecha de Instalacion: {{ $installog->fecha_instalacion }}</h1>
                        <h2 class="font-semibold">Estacion: {{ $installog->estation->name }}</h2>
                        <h2 class="font-semibold">Registrado por: {{ $installog->user->name }}</h2>
                    </div>
                </div>
                <div class="mt-2">
                    <iframe src="//www.nothuman.net/images/files/discussion/1/e72f9f1f181a66887baa7270037c582e.pdf"
                        width="100%" height="350px">
                    </iframe>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$set('modal',false)" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
            </x-slot>
        </x-jet-dialog-modal>
    @endif
</div>
