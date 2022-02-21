<div class="container">
    <div class="flex my-3 ml-10">
        <input wire:model='search' class="form-control rounded-xl mr-sm-2 w-5/6" type="search" placeholder="Búsqueda" aria-label="Search">
        
        <select class="rounded-xl ml-3" name="tipo" id="tipo" wire:model='estado'>
            <option seleted value="">Todos los Estados</option>
            <option value="BORRADOR">Borrador</option>
            <option value="PRESENTADO">Presentado</option>
            <option value="REVISADO">Revisado</option>
        </select>

        <select class="rounded-xl ml-3" name="tipo" id="tipo" wire:model='tipo'>
            <option seleted value="">Tipo</option>
            <option value="ACTIVIDADES">Actividades</option>
            <option value="MEDICION">Medicion</option>
            <option value="PROMOCION">Promocion</option>
        </select>

        <x-jet-button wire:click="addReport" class="bg-green-500 ml-5">
            Añadir
            <span class="w-6 h-6 ml-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                        clip-rule="evenodd" />
                </svg>
            </span>
        </x-jet-button>
    </div>
    <table class="rounded-t-lg m-5 w-11/12 mx-auto bg-gray-500 text-gray-800">
        <tr class="border-b-2 border-gray-300 text-center text-white">
            <th class="w-4/12 px-4 py-3">Asunto</th>            
            <th class="px-4 py-3">Comision</th>
            <th class="px-4 py-3">Fecha</th>
            <th class="px-4 py-3">Estado</th>
            <th class="px-2 py-3"></th>
        </tr>
        <tbody>
        @if ($reports->isNotEmpty() )
            @foreach ($reports as $report)
            <tr class="bg-gray-100 border-b border-gray-300 py-1 hover:bg-green-100">
                <td class="w-4/12 text-sm px-2 text-left uppercase">
                    <a href="{{ route('informe.show', [$report]) }}" class="font-semibold hover:text-blue-600">
                        {{ $report->asunto }}
                    </a>
                </td>               
                <td class="text-sm text-gray-600">
                    <a href="{{ route('commision.show', [$report->commission]) }}">
                        C-{{$report->commission->id}}:{{ Str::limit($report->commission->name, 70, '...')  }}
                    </a>
                </td>
                <td class="text-sm text-center w-24 text-gray-400">{{ $report->fechaCreacion }}</td>
                <td class="px-2 text-left">
                    @if ($report->estado == 'BORRADOR')
                        <div
                            class="text-gray-100 text-sm text-center bg-yellow-600 bg-clip-content font-semibold w-36 rounded-xl">
                            {{ $report->estado }}
                        </div>
                    @else
                        @if($report->estado == 'PRESENTADO')
                            <div class="text-gray-100 text-sm text-center bg-blue-500 bg-clip-content font-semibold w-36 rounded-xl">
                            {{ $report->estado }}
                            </div>
                        @endif
                        @if ($report->estado == 'REVISADO')
                            <div
                                class="text-gray-100 text-sm text-center bg-green-500 bg-clip-content font-semibold w-36 rounded-xl">
                                {{ $report->estado }}
                            </div>
                        @endif
                    @endif    
                </td>
                <td class="px-2 text-right">
                    <div class="flex justify-center">
                        @if ($report->estado == 'BORRADOR')
                            <button wire:click="editReport({{ $report->id }})"
                            class="text-blue-500 hover:text-gray-900 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 m-auto" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </button>
                            <button wire:click="delReport({{ $report->id }})"
                                class="text-red-500 hover:text-gray-900 cursor-pointer ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 m-auto" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        @endif
                        @if ($report->estado == 'PRESENTADO')
                            <a href="#" class="text-gray-500 hover:text-gray-900 cursor-pointer">
                                <svg class="w-8 h-8 m-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                    <path fill="currentColor"
                                        d="M448 192V77.25c0-8.49-3.37-16.62-9.37-22.63L393.37 9.37c-6-6-14.14-9.37-22.63-9.37H96C78.33 0 64 14.33 64 32v160c-35.35 0-64 28.65-64 64v112c0 8.84 7.16 16 16 16h48v96c0 17.67 14.33 32 32 32h320c17.67 0 32-14.33 32-32v-96h48c8.84 0 16-7.16 16-16V256c0-35.35-28.65-64-64-64zm-64 256H128v-96h256v96zm0-224H128V64h192v48c0 8.84 7.16 16 16 16h48v96zm48 72c-13.25 0-24-10.75-24-24 0-13.26 10.75-24 24-24s24 10.74 24 24c0 13.25-10.75 24-24 24z">
                                    </path>
                                </svg>
                            </a>
                        @endif
                    </div>    
                </td>
            </tr>
            @endforeach
        @else
            <tr class="bg-white border-b border-gray-300 py-1">
                <td colspan="5" class="text-center font-bold">No se encuentra registros</td>
            </tr>
        @endif
        </tbody>
    </table>

    {{ $reports->links() }}
   
    {{-- Modal de Añadir --}}
    <x-jet-dialog-modal wire:model="modalAdd">
        <x-slot name="title">
            <h1 class="font-bold uppercase">Crear Informe</h1>
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label class="text-base font-bold border-gray-200" for="name"
                    value="{{ __('Asunto del Informe') }}" />
                <textarea id="name"  wire:model.defer='report.asunto' class="resize-none w-full h-20 border rounded-md">

                </textarea>
                <x-jet-input-error for="report.asunto" class="mt-2" />
            </div>

            <div class="flex justify-between">

                <div class="col-span-6 sm:col-span-4 mt-2">
                    <x-jet-label class="text-base font-bold border-gray-200" for="fecha" value="{{ __('Fecha') }}" />
                    <x-jet-input id="fechaCreacion" type="date" class="mt-1 rounded-xl block font-semibold"
                        wire:model.defer='report.fechaCreacion'/>
                    <x-jet-input-error for="report.fechaCreacion" class="mt-2" />
                </div>
            </div>
            <div class="col-span-6 sm:col-span-4 mt-2">
                <x-jet-label class="text-base font-bold border-gray-200" for="name"
                    value="{{ __('Comision de Servicio Confirmadas') }}" />
                <table class="rounded-t-lg m-5 w-11/12 mx-auto bg-gray-200 text-gray-800">
                    <tr class="text-left border-b-2 border-gray-300">
                        <th colspan="2" class="font-bold px-4 py-3">Asuntos</th>
                    </tr>
                    @foreach ($users as $item)
                        @foreach ($item->commissions as $commission)
                            @if ($commission->estado === 'CONFIRMADA' )
                            <tr class="bg-gray-100 border-b border-gray-200">
                                <td class="px-4 py-3">
                                    <input class="rounded-2xl" wire:model='selectedCommission'
                                        value="{{ $commission->id}}" type="radio">
                                </td>
                                <td class="px-4 py-3">{{ $commission->name }}</td>
                            </tr>
                            @endif
                        @endforeach    
                    @endforeach
                </table>
                {{ $users->links() }}
                <x-jet-input-error for="selectedCommission" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('modalAdd',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="saveReport()" wire:loading.attr="disabled">
                {{ __('Guardar') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    {{-- Modal de Eliminar --}}
    <x-jet-dialog-modal wire:model="modalDel">
        <x-slot name="title">
            <h1 class="font-bold">{{ __('Eliminar Informe') }}</h1>
        </x-slot>

        <x-slot name="content">
            {{ __('¿Seguro que desea eliminar?') }}

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('modalDel',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="deleteReport({{ $modalDel }})" wire:loading.attr="disabled">
                {{ __('Eliminar') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>