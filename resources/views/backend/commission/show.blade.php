@extends('backend.admin')

@section('main')
    <section class="mt-4">
        @livewire('commission.show-commission', ['commission' => $commission], key($commission->id))
    </section>
    <div class="text-center items-center text-xl mt-6 w-full font-extrabold text-green-600 uppercase">
        <h1>{{$commission->name}}</h1>
        <p class="text-sm text-gray-600 -mt-4 text-right font-bold">Estado: {{ $commission->estado }}</p>
    </div>
    <div class="flex justify-end">
        <p class="text-sm text-gray-600  text-right font-bold">Tipo: {{ $commission->tipo }}</p>
    </div>
    <div class="justify-end">
        <p class="text-sm text-gray-600  text-right font-bold">Inicio: {{ $commission->fechainicio }}</p> 
        <p class="text-sm text-gray-600  text-right font-bold">Fin: {{ $commission->fechafin }}</p>
    </div>

    @if ($commission->tipo === 'ACTIVIDADES')
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
    
    <section>
        <livewire:commission.commission-objetives :commission="$commission">
    </section>
    
    @if ($commission->tipo === 'ACTIVIDADES')
    <section>
        <livewire:commission.commission-articles :commission="$commission">
    </section>
    @endif

@endsection
