<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ public_path('css/app.css')}}" rel="stylesheet" type="text/css">   
    <link href="css/tailwind2.css" rel="stylesheet" type="text/css">   
    <title>{{$commission->name}}</title>

</head>
<body class="font-sans">
    <div class="flex justify-between">
        <div style="float: right; font-size: 12px;">
            <p>Fecha : {{date('j-m-y')}}</p>
            <p>Hora : {{date('h:i:s')}}</p>
        </div>
        <header>
            <h1>GOBIERNO REGIONAL AMAZONAS</h1>
            <h2>Direccion Regional de Transportes y Comunicaciones</h2>
            <h2>Direccion de Comunicaciones</h2>
        </header>
        
    </div>
    
    <p class="text-center text-2xl font-extrabold">REPORTE DE COMISION</p>
    
    <div style="border-width: 1px; ">
        <p>Asunto</p>
        <p class="ml-16 font-bold">{{$commission->name}}</p>
        <p>Tipo : {{$commission->tipo}}</p>
        <p>Fecha del {{$commission->fechainicio}} al {{$commission->fechafin}}</p>

        @if ($commission->tipo === 'ACTIVIDADES')
            <p>Estaciones a visitar:</p>
            @foreach ($commission->estations as $estation)
                <p class="ml-32">- {{$estation->name}} - Distrito: {{$estation->ubigeo->distrito}}</p>
            @endforeach
        @else
            <p>Lugares a visitar:</p>
            @foreach ($commission->ubigee as $ubigeo)
                <p class="ml-32"> Provincia {{$ubigeo->provincia}}, Distrito: {{$ubigeo->distrito}}</p>
            @endforeach
        @endif

        <p>Personal :</p>
        @foreach ($commission->users as $user)
            <p class="ml-32">- {{$user->name}} Cargo: {{$user->cargo}}</p>
        @endforeach

        @if ($commission->tipo === 'ACTIVIDADES')
            <p >Equipos a trasaladar:</p>
            @foreach ($commission->articles as $article)
                <p class="">-{{$article->denominacion}}</p>
                <p class="ml-32">Cod. Patrimonial:{{$article->codPatrimonial}}</p>
                <p class="ml-32">N° Serie:{{$article->nserie}}</p>
                <p class="ml-32">Marca:{{$article->marca}}</p>
                <p class="ml-32">Modelo:{{$article->modelo}}</p>
            @endforeach
        @endif
    
        <p>Objetivo(s):</p>
        @foreach ($commission->objetives as $objetive)
            <p class="ml-32">- {{$objetive->name}}</p>
        @endforeach
    </div>
    <footer class="text-center font-extrabold mt-96">
        <p>TI - DCOM - Amazonas </p>
        <p> Copyright &copy;  DRTC-AMAZONAS {{date("Y")}}</p>
    </footer>
</body>

</html>
