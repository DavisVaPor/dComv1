@extends('welcome')

@section('content')

    <div class="relative z-10 bg-cover" style="background-image: url(images/antenas.png)">
        <div class="container">
            <div class="justify-center row">
                <div class="w-full lg:w-5/6 xl:w-2/3">
                    <div class="pt-40 pb-8 text-center header-content m-auto w-full">
                        <img class="m-auto" src="images/recurso1.png" alt="logo">
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
                        <h4 class="title text-blue-600 text-center">Estaciones en la Region Amazonas</h4>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->

                @livewire('frontend.services-estations')
           
        </div> <!-- container -->
    </section>
    
@endsection 
