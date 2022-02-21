@extends('backend.admin')

@section('main')

<livewire:report.show-report :informe="$informe">


    <div class=" mt-2 font-extrabold text-gray-600">
        <h2 class="text-xl  text-center">{{ $informe->asunto }}</h2>
        <div class="flex justify-end items-center">
            <h2 class="mr-4">
                @if ($informe->tipo === 'MANTENIMIENTO')
                <p>Tipo: <span class="font-bold underline ">MANTENIEMIENTO DE LOS SISTEMAS DE TELECOMUNICACION</span></p> 
                @else 
                    @if ($informe->tipo === 'MEDICION')
                    <p>Tipo: <span class="font-bold underline">MEDICION DE RADIACION NO IONIZANTE (RNI)</span></p> 
                    @else
                    <p>Tipo: <span class="font-bold underline">PROMOCION DE LAS TELECOMUNIACIONES</span></p> 
                    @endif
                @endif
            </h2>
            <h2 class="font-bold flex justify-end items-center">
                Estado:
                @if ($informe->estado == 'BORRADOR')
                    <div class="text-yellow-500 px-2 py-3 text-sm text-center  opacity-70 bg-clip-content font-extrabold rounded-lg">
                        {{ $informe->estado }}
                    </div>
                @else
                    @if ($informe->estado == 'PRESENTADO')
                        <div class="text-green-500 text-sm text-center bg-clip-content font-extrabold rounded-xl">
                            {{ $informe->estado }}
                        </div>
                    @else @if ($informe->estado == 'REVISADO')
                            <div
                                class="text-blue-500 text-sm text-center bg-clip-content font-extrabold rounded-xl">
                                {{ $informe->estado }}
                            </div>
                        @else
                            <div
                                class="text-gray-500 text-sm text-center bg-clip-content font-extrabold rounded-xl">
                                {{ $informe->estado }}
                            </div>
                        @endif
                    @endif
                @endif
            </h2>
        </div>

    </div>


        <section>
            <div class="flex my-3 justify-between border-b border-gray-300 border-3">
                <h1 class="mr-5 text-lg font-bold text-gray-800">COMISIÓN</h1>
            </div>
            <h2 class="text-blue-500 font-semibold underline ml-10">
                #C-{{$informe->commission->id}}: {{$informe->commission->name}}
            </h2>
            <div class="flex my-3 justify-between border-b border-gray-300 border-3">
                <h1 class="mr-5 text-lg font-bold text-gray-800 ">OBJETIVOS</h1>
            </div>
            
            @if ($informe->commission->objetives->isNotEmpty())
                <table class="rounded-t-lg m-5 w-11/12 mx-auto bg-gray-200 text-gray-800">
                    <tr class="text-left border-b-2 border-gray-300">
                        <th class="px-4 py-3 w-1/12 text-center ">#</th>
                        <th class="px-4 py-3">Descripcion</th>
                    </tr>
                    @foreach ($informe->commission->objetives as $objective)
                        <tr class="bg-gray-100 border-b border-gray-200">
                            <td class="px-4 py-3 font-bold text-center">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3 text-sm">{{ $objective->name }}</td>
                        </tr>
                    @endforeach
                </table>
            @endif
            @isset($informe->commission->ubigee)
                <div class="flex my-3 justify-between border-b border-gray-300 border-3">
                    <h1 class="mr-5 text-lg font-bold text-gray-800">LUGARES</h1>       
                </div>

                <div class="justify-content-between">
                    <table class="table-auto rounded-t-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
                        <tr class="text-left border-b-2 border-gray-300">
                            <th class="px-4 py-3 text-center">Provincia</th>
                            <th class="px-4 py-3 text-center">Distrito</th>
                        </tr>
                        @forelse ($informe->commission->ubigee as $item)
                            <tr class="bg-gray-100 border-b border-gray-200">
                                <td class="px-4 py-3 text-center">{{ $item->provincia }}</td>
                                <td class="px-4 py-3 text-center">{{ $item->distrito }}</td>
                            </tr>
                        @empty
                        @endforelse
                    </table>
                </div>
            @endisset
        </section>

        @if ($informe->tipo == 'ACTIVIDADES')
            <section>
                <livewire:report.report-activities :informe="$informe">
            </section>
        @else
            <section>
                <livewire:report.report-measurements :informe="$informe">
            </section>
        @endif
        @if ($informe->tipo == 'PROMOCION')
            <section>
                {{-- <livewire:report-promotions :informe="$informe"> --}}
            </section>
        @endif
        <section>
            <livewire:report.report-conclusions :informe="$informe">
        </section>

        <section>
            <livewire:report.report-observations :informe="$informe">
        </section>

        <section>
                <h1 class="mr-5 text-lg font-bold text-gray-800">ANEXOS</h1>
                <livewire:report.report-images :informe="$informe">
            @if ($informe->tipo == 'ACTIVIDADES')
                {{-- <livewire:report-actas :informe="$informe"> --}}
            @endif
        </section>

        @if ($informe->tipo == 'ACTIVIDADES')
        <div>
            <style>
                .tab {
                    overflow: hidden;
                }
    
                .tab-content {
                    max-height: 0;
                    transition: all 0.5s;
                }
    
                input:checked+.tab-label .test {
                    background-color: #000;
                }
    
                input:checked+.tab-label .test svg {
                    transform: rotate(180deg);
                    stroke: #fff;
                }
    
                input:checked+.tab-label::after {
                    transform: rotate(90deg);
                }
    
                input:checked~.tab-content {
                    max-height: 100vh;
                }
    
            </style>
            <main class="w-full p-8 mx-auto">
                <section class="shadow row">
                    {{-- <livewire:report-systems :informe="$informe"> --}}
                </section>
            </main>
        </div>
        @endif
    @endsection