@extends('backend.admin')

@section('main')
    <div class="text-center text-3xl mt-2 font-extrabold text-green-600">
        <h1>ACTIVIDADES REALIZADAS</h1>
    </div>
    <div class="text-right">
        <p class="text-blue-700 font-semibold text-lg">{{ Auth::user()->name }}, {{ Auth::user()->apellido }} </p>
        <p class="text-gray-500 font-semibold text-base">{{ Auth::user()->cargo }}</p> 
    </div>
    @livewire('activity.activities')
@endsection
