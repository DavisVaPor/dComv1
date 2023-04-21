
@extends('backend.admin')

@section('main')
    <div class="text-center text-3xl mt-4 font-extrabold text-green-600">
        <h1>BANDEJA DE INFORMES</h1>
    </div>
    @if (Auth::user()->rol_id == '2')
        <livewire:bandeja.reports>
    @else
    <div class="text-center h-screen mt-64 text-3xl font-extrabold">
        <h1 class="text-gray-600">ERROR 505</h1>
        <h1 class="text-red-600">ACCESO DENEGADO</h1>
    </div>
    @endif
@endsection

