@extends('welcome')

@section('content')

    <div class="relative z-10 bg-cover" style="background-image: url(images/drtc1.png)">
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

    <section id="service" class="relative services-area py-6">
        <div class="container">
            <div class="flex">
                <div class="w-full mx-4">
                    <div class="pb-6 section-title">
                        <h4 class="title text-blue-600 text-center">Noticias</h4>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <div class="container lg:flex ">
        <section class="mb-8 w-9/12 md:w-full">
            <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                <div class="shadow-md">
                <img src="https://images.unsplash.com/photo-1497493292307-31c376b6e479?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1171&q=80" alt="" />
                <div class="px-4">
                    <h1 class="mt-3 text-gray-800 text-2xl font-bold my-2">long established</h1>
                    <p class="text-gray-700 mb-2">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that....</p>
                    <div class="flex justify-between mt-4">
                    <span class="font-thin text-sm">May 20th 2021</span>
                    <span class="mb-2 text-gray-800 font-bold">Read more</span>
                    </div>
                </div>
                </div>
                <div class="shadow-md">
                    <img src="https://images.unsplash.com/photo-1497493292307-31c376b6e479?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1171&q=80" alt="" />
                    <div class="px-4">
                    <h1 class="mt-3 text-gray-800 text-2xl font-bold my-2">long established</h1>
                    <p class="text-gray-700 mb-2">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that....</p>
                    <div class="flex justify-between mt-4">
                        <span class="font-thin text-sm">May 20th 2021</span>
                        <span class="mb-2 text-gray-800 font-bold">Read more</span>
                    </div>
                    </div>
                </div>
                <div class="shadow-md">
                    <img src="https://images.unsplash.com/photo-1497493292307-31c376b6e479?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1171&q=80" alt="" />
                    <div class="px-4">
                    <h1 class="mt-3 text-gray-800 text-2xl font-bold my-2">long established</h1>
                    <p class="text-gray-700 mb-2">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that....</p>
                    <div class="flex justify-between mt-4">
                        <span class="font-thin text-sm">May 20th 2021</span>
                        <span class="mb-2 text-gray-800 font-bold">Read more</span>
                    </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="ml-5 w-3/12">
            <h1 class="font-bold text-right">Proximos Eventos</h1>
            <div class="justify-center grid grid-cols-1">
                <div class="shadow-md">
                <img src="https://images.unsplash.com/photo-1497493292307-31c376b6e479?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1171&q=80" alt="" />
                <div class="px-4">
                    <h1 class="mt-3 text-gray-800 text-2xl font-bold my-2">long established</h1>
                    <div class="flex justify-between mt-4">
                    <span class="font-thin text-sm">May 20th 2021</span>
                    <span class="mb-2 text-gray-800 font-bold">Inscribirse</span>
                    </div>
                </div>
                </div>
            </div>
        </section>
     </div>
@endsection 
