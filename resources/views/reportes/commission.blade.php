<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ public_path('css/app.css') }}" rel="stylesheet" type="text/css">
    <link href="css/tailwind2.css" rel="stylesheet" type="text/css">
    <title>{{ $commission->name }}</title>

    <style>
        .flex {
            display: flex;
        }

    </style>

    @php
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    @endphp

</head>

<body class="font-sans">
    <div class="flex justify-between">
        <div style="float: right; font-size: 12px;">
            <p>Fecha : {{ date('j-m-y') }}</p>
            <p>Hora : {{ date('h:i:s') }}</p>
        </div>
        <header>
            <p class="text-base font-bold">Gobierno Regional Amazonas</p>
            <p class="text-sm font-bold">Dirección Regional de Transportes y Comunicaciones</p>
            <p class="text-xs font-bold">Dirección de Comunicaciones</p>
        </header>

    </div>

    <p class="text-center text-2xl font-bold mt-8">
        COMISION DCOM reg. C{{ $commission->id }}-{{ $commission->anho }}</p>
    <div>
        <div class="flex">
            <p>Asunto: <span class="font-bold">{{ $commission->name }}</span></p>
        </div>
        <div class="flex">
            @if ($commission->tipo === 'MANTENIMIENTO')
                <p>Tipo: <span class="font-bold">MANTENIEMIENTO DE LOS SISTEMAS DE TELECOMUNICACION</span></p> 
            @else 
                @if ($commission->tipo === 'MEDICION')
                <p>Tipo: <span class="font-bold">MEDICION DE RADIACION NO IONIZANTE (RNI)</span></p> 
                @else
                <p>Tipo: <span class="font-bold">PROMOCION DE LAS TELECOMUNIACIONES</span></p> 
                @endif
            @endif
        </div>
        <div class="flex">
            <p>Periodo:
                <span class="font-bold">
                    @if (($commission->fechainicio === $commission->fechafin))
                        {{Str::after($commission->fechainicio,Str::between($commission->fechainicio,'-','-').'-')}}-{{$meses[date(Str::between($commission->fechainicio,'-','-'))-1]}}-{{Str::before($commission->fechainicio,'-')}}
                    @else
                        Del {{Str::after($commission->fechainicio,Str::between($commission->fechainicio,'-','-').'-')}}-{{$meses[date(Str::between($commission->fechainicio,'-','-'))-1]}}-{{Str::before($commission->fechainicio,'-')}}
                        al  {{Str::after($commission->fechafin,Str::between($commission->fechafin,'-','-').'-')}}-{{$meses[date(Str::between($commission->fechafin,'-','-'))-1]}}-{{Str::before($commission->fechafin,'-')}}
                    @endif
                </span>
            </p>
        </div>
        <p></p>

        <div class="my-8">
            @if ($commission->tipo === 'MANTENIMIENTO')
                <p class="font-bold underline">Estaciones a visitar:</p>
                @foreach ($commission->estations as $estation)
                    <p class="ml-16">{{ $estation->name }} - {{ $estation->ubigeo->distrito }},
                        {{ $estation->ubigeo->provincia }}</p>
                @endforeach
            @else
                <p class="font-bold underline">Lugares a visitar:</p>
                @foreach ($commission->ubigee as $ubigeo)
                    <p class="ml-16"> 
                        {{ $loop->iteration }} Distrito:{{ $ubigeo->distrito }} - {{ $ubigeo->provincia }}
                    </p>
                @endforeach
            @endif
        </div>

        <div class="my-8">
            <p class="font-bold underline">Personal :</p>
            @foreach ($commission->users as $user)
                <p class="ml-16">{{ $loop->iteration }}.- {{ $user->name }} {{ $user->apellido }}
                    <span class="font-bold">Cargo:</span>
                    {{ $user->cargo }}
                </p>
            @endforeach
        </div>

        <div class="my-8">
            <p class="font-bold underline">Objetivo(s):</p>
            @foreach ($commission->objetives as $objetive)
                <p class="ml-16">{{ $loop->iteration }}-{{ $objetive->name }}</p>
            @endforeach
        </div>

        <div class="my-8">
            @if ($commission->tipo === 'MANTENIMIENTO')
                <p class="font-bold underline">Equipos a trasaladar:</p>
                <table class="table-auto m-auto">
                    <thead>
                        <tr class="border-b-2 border-gray-300 text-center text-white ">
                            <th class="">#</th>
                            <th class="px-4 py-3">Nombre</th>
                            <th class="px-4 py-3">cod.</th>
                            <th class="px-4 py-3">Serie</th>
                            <th class="px-4 py-3">Marca</th>
                            <th class="px-4 py-3">Modelo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($commission->articles as $article)
                            <tr>
                                <td class="">{{ $loop->iteration }}</td>
                                <td class="px-4 py-3">{{ $article->denominacion }}</td>
                                <td class="px-4 py-3">{{ $article->codPatrimonial }}</td>
                                <td class="px-4 py-3">{{ $article->nserie }}</td>
                                <td class="px-4 py-3">{{ $article->marca }}</td>
                                <td class="px-4 py-3">{{ $article->modelo }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
    <footer class="text-center font-bold mt-32">
        <p>Area de Tecnologia de la Informacion</p>
        <p> Copyright &copy; DRTC-AMAZONAS {{ date('Y') }}</p>
    </footer>
</body>

</html>
