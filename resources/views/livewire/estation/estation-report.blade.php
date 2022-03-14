<div class="">
    <div class="flex my-3 items-center">
        <input wire:model='search' class="form-control rounded-lg mr-sm-2 w-4/6 m-auto mr-6" type="search"
            placeholder="Búsqueda" aria-label="Search">
        <select class="rounded-lg mr-6" wire:model='anho' name="" id="">
            <option selected value="">Tipo</option>
            <option class="font-bold" value="MANTENIMIENTO">MANTENIMIENTO</option>
            <option class="font-bold" value="MEDICION">MEDICION</option>
            <option class="font-bold" value="PROMOCION">PROMOCION</option>
        </select>
        <select class="rounded-lg mr-6" wire:model='mes' name="" id="">
            <option selected value="">Meses</option>
            @foreach ($mes as $item)
                <option selected value="{{ $loop->iteration }}">{{ $item }}</option>
            @endforeach
        </select>
        <select class="rounded-lg mr-6" wire:model='anho' name="" id="">
            <option selected value="">Año</option>
            <option class="font-bold" value="2021">2021</option>
            <option class="font-bold" value="2021">2022</option>
        </select>

        <div>
            <svg class="w-8 h-8 m-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                <path fill="currentColor"
                    d="M448 192V77.25c0-8.49-3.37-16.62-9.37-22.63L393.37 9.37c-6-6-14.14-9.37-22.63-9.37H96C78.33 0 64 14.33 64 32v160c-35.35 0-64 28.65-64 64v112c0 8.84 7.16 16 16 16h48v96c0 17.67 14.33 32 32 32h320c17.67 0 32-14.33 32-32v-96h48c8.84 0 16-7.16 16-16V256c0-35.35-28.65-64-64-64zm-64 256H128v-96h256v96zm0-224H128V64h192v48c0 8.84 7.16 16 16 16h48v96zm48 72c-13.25 0-24-10.75-24-24 0-13.26 10.75-24 24-24s24 10.74 24 24c0 13.25-10.75 24-24 24z">
                </path>
            </svg>
        </div>
    </div>

    <table class="table-auto rounded-t-lg m-5 w-full mx-auto bg-gray-200 text-gray-800">
        <tr class="text-center border-b-2 border-gray-300">
            <th class="w-4/6 px-4 py-3">Comision</th>
            <th class="px-4 py-3">Tipo</th>
            <th class="px-4 py-3">Estado</th>
        </tr>
        @forelse ($commissions as $item)
            <tr class="bg-gray-100 border-b border-gray-200 hover:bg-blue-200">
                <td class="px-4 py-3">
                    <a href="{{ route('commision.show', [$item]) }}" target="_blank" class="text-sm text-gray-900 block uppercase hover:text-blue-500">
                        {{ $item->name }}
                    </a>
                </td>
                <td class="px-4 py-3">
                    <span class="text-sm text-gray-900 block uppercase">
                        {{ $item->tipo }}
                    </span>
                </td>
                <td class="px-4 py-3">
                    @if ($item->estado === 'CONFIRMADA' || $item->estado === 'REALIZADA')
                        <span class="text-green-600 font-bold">{{ $item->estado }}</span>
                    @else
                        @if ($item->estado === 'REGULAR')
                            <span class="text-yellow-600 font-bold">{{ $item->estado }}</span>
                        @else
                            <span class="text-red-600 font-bold">{{ $item->estado }}</span>
                        @endif
                    @endif
                </td>
            </tr>
        @empty
            <tr class="bg-gray-100 border-b border-gray-200">
                <td colspan="6" class="text-center px-4 py-3 font-bold text-gray-600">No hay registros</td>
            </tr>
        @endforelse
    </table>
    <h1 class="text-right text-blue-700">Total: {{ $estation->commissions->count() }}</h1>
</div>
