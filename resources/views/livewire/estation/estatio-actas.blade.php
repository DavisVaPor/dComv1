<div>
    <table class="rounded-t-lg m-2 w-full mx-auto bg-gray-200 text-gray-800">
        <tr class="text-left border-b-2 border-gray-300">
            <th class="w-1/2 px-4 py-3">Acta de Mantenimiento</th>
            <th class="px-4 py-3 text-center">Fecha</th>
            <th class="px-4 py-3 text-center">Acciones</th>
        </tr>
        @forelse ($estation->actas as $item)
            <tr class="bg-gray-100 border-b border-gray-200">
                <td class="px-4 py-3 text-sm font-extrabold">
                    <div class="flex items-center">
                        <div class="mr-2 text-black">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                    clip-rule="evenodd"></path>
                            </svg>

                        </div>
                        <span class="font-medium">{{ $item->name }}</span>
                    </div>
                </td>
                <td class="px-4 py-3 text-sm text-center">{{ $item->fecha }}</td>
                <td class="px-4 py-3 text-sm text-center">{{ $item->fecha }}</td>
                <td class="">
                    <div class="flex item-center justify-center">
                        <abbr title="Previsualizcion del Documento">
                            <button wire:click='infoActa({{ $item }})'
                                class="w-6 mr-2 transform hover:text-blue-500 hover:scale-110">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </abbr>
                    </div>
                </td>
            </tr>
        @empty
            <tr class="bg-gray-100 border-b border-gray-200">
                <td colspan="7" class="text-center text-gray-400">No se encuentran registros </td>
            </tr>
        @endforelse
    </table>

    {{-- Visualizar Acta Cargada --}}
    @isset($visualizarActa)
        <x-jet-dialog-modal wire:model="modalInfo">
            <x-slot name="title">
                <h1 class="uppercase">Acta de Manteniemiento</h1>
            </x-slot>

            <x-slot name="content">
                <h1 class="text-lg text-center font-extrabold">
                    ESTACIÓN DE {{ $visualizarActa->estation->name }}
                </h1>
                <h3 class="text-sm font-extrabold mb-2">
                    FECHA DEL Servicio: {{ $visualizarActa->fecha }}
                </h3>
                <iframe src="{{ Storage::url($visualizarActa->file_url) }}" width="100%" height="400px">
                </iframe>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$set('modalInfo',false)" wire:loading.attr="disabled">
                    {{ __('Cerrar') }}
                </x-jet-secondary-button>
            </x-slot>
        </x-jet-dialog-modal>
    @endisset
</div>
