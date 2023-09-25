<div>
    <table class="rounded-t-lg m-2 w-full mx-auto bg-gray-200 text-gray-800">
        <tr class="text-left border-b-2 border-gray-300">
            <th class="text-center">#</th>
            <th class="w-1/2 px-4 py-3">Equipo</th>
            <th class="px-4 py-3 text-center">Cantidad</th>
            <th class="px-4 py-3 text-center">Estado</th>
        </tr>
        @forelse ($estation->requeriments as $item)
            <tr class="bg-gray-100 border-b border-gray-200">
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="px-4 py-3 text-sm font-extrabold">{{ $item->equipment->name }}</td>
                <td class="px-4 py-3 text-sm text-center">{{ $item->cantidad }}</td>
                <td class="px-4 py-3 text-sm text-center">{{ $item->estado }}</td>
                <td class="">
                        <button class="text-gray-500 hover:text-yellow-900 cursor-pointer"
                            wire:click="info({{ $item->id }})" wire:loading.attr="disabled">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 m-auto" viewBox="0 0 192 512">
                                <path fill="currentColor"
                                    d="M256 0v128h128L256 0zM224 128L224 0H48C21.49 0 0 21.49 0 48v416C0 490.5 21.49 512 48 512h288c26.51 0 48-21.49 48-48V160h-127.1C238.3 160 224 145.7 224 128zM272 416h-160C103.2 416 96 408.8 96 400C96 391.2 103.2 384 112 384h160c8.836 0 16 7.162 16 16C288 408.8 280.8 416 272 416zM272 352h-160C103.2 352 96 344.8 96 336C96 327.2 103.2 320 112 320h160c8.836 0 16 7.162 16 16C288 344.8 280.8 352 272 352zM288 272C288 280.8 280.8 288 272 288h-160C103.2 288 96 280.8 96 272C96 263.2 103.2 256 112 256h160C280.8 256 288 263.2 288 272z" />
                            </svg>
                        </button>
                    </div>
                </td>
            </tr>
        @empty
            <tr class="bg-gray-100 border-b border-gray-200">
                <td colspan="7" class="text-center text-gray-400">No se encuentran registros </td>
            </tr>
        @endforelse
    </table>

    {{-- Modal de Info --}}
    @isset($equiponame)
        <x-jet-dialog-modal wire:model="modalInfo">
            <x-slot name="title">
                <h1 class="font-bold uppercase">{{ __('Especificaciones del '.$equiponame->name) }}</h1>
            </x-slot>
            <x-slot name="content">
                <div class="inline-block">
                    <label class="text-base" for="">Identificador: {{ $equiponame->identificador }}</label>
                    <br>
                    <label class="text-base" for="">Unidad de Medida: {{ $equiponame->unidad_medida	 }}</label>    
                </div>
                
                <x-jet-label class="text-base font-bold border-gray-200" for="requirement.descripcion"
                    value="{{ __('Descripcion') }}" />
                <textarea id="descripcion" class="resize-none text-left w-full h-1/4 border rounded-md" disabled>
                    {{$requirement->descripcion}}
                </textarea>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$set('modalInfo',false)" wire:loading.attr="disabled">
                    {{ __('Cerrar') }}
                </x-jet-secondary-button>

            </x-slot>
        </x-jet-dialog-modal>
    @endisset

</div>
