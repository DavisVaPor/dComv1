@extends('welcome')

@section('content')

    <div class="relative z-10 bg-cover" style="background-image: url(images/trabajo.jfif)">
        <div class="container">
            <div class="justify-center row">
                <div class="w-full lg:w-5/6 xl:w-2/3">
                    <div class="pt-40 pb-8 text-center header-content m-auto w-full">
                        <img src="images/recurso1.png" alt="logo">
                    </div> <!-- header content -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- header content --> 

    <section id="service" class="relative services-area py-8">
        <div class="container">
            <div class="flex">
                <div class="w-full mx-4">
                    <div class="pb-10 section-title">
                        <h4 class="title text-blue-600 text-center">Trabajos Realizados</h4>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="flex">
                <input class="focus:ring-2 focus:ring-blue-500 focus:outline-none appearance-none w-full text-sm leading-6 text-slate-900 placeholder-slate-400 rounded-md py-2 pl-10 ring-1 ring-slate-200 shadow-sm" type="text" aria-label="Filter projects" placeholder="Buscar">
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
@endsection 
