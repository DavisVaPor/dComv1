@extends('backend.admin')

@section('main')
    <section class="mt-4">
        @livewire('commission.show-commission', ['commission' => $commission], key($commission->id))
    </section>
    <div class="flex justify-between">
        <div>

        </div>
    </div>
    <div class="text-center items-center text-xl mt-6 w-full font-extrabold text-green-600 uppercase">
        <h1>DCOM-{{ $commission->numero }} - {{ $commission->anho }}</h1>
        <h3>{{ $commission->name }}</h1>
    </div>
    <div class="flex justify-between mt-4">
        <div class="mx-4">
            <p class="text-sm text-gray-600  text-right font-bold">Estado: {{ $commission->estado }}</p>
        </div>
        <div class="text-sm">
            @if ($commission->tipo === 'MANTENIMIENTO')
                <p>Tipo: <span class=" ">MANTENIEMIENTO DE LOS SISTEMAS DE TELECOMUNICACIÓN</span>
                </p>
            @else
                @if ($commission->tipo === 'MEDICION')
                    <p>Tipo: <span class="">MEDICION DE RADIACION NO IONIZANTE (RNI)</span></p>
                @else
                    <p>Tipo: <span class="">PROMOCION DE LAS TELECOMUNIACIONES</span></p>
                @endif
            @endif
        </div>

        <div class="mx-2">
            <p class="text-sm text-gray-600  text-right font-bold">Inicio: {{ $commission->fechainicio }}</p>
        </div>
        <div class="mx-2">
            <p class="text-sm text-gray-600  text-right font-bold">Fin: {{ $commission->fechafin }}</p>
        </div>
    </div>
    
    <section>
        <livewire:commission.commission-objetives :commission="$commission">
    </section>

    @if ($commission->tipo === 'MANTENIMIENTO')
        <section>
            <livewire:commission.commission-estations :commission="$commission">
        </section>
    @else
        <section>
            <livewire:commission.commission-ubigees :commission="$commission">
        </section>
    @endif

    <section>
        <livewire:commission.commission-users :commission="$commission">
    </section>

    

    @if ($commission->tipo === 'MANTENIMIENTO')
        <section>
            <livewire:commission.commission-articles :commission="$commission">
        </section>
    @endif

@endsection
