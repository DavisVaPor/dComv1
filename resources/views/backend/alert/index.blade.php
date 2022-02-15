@extends('admindashboard')

@section('main')
    <div class="text-center text-3xl mt-2 font-extrabold text-green-600">
        <h1>ALERTAS</h1>
    </div>
    @livewire('alert.alerts')
@endsection
