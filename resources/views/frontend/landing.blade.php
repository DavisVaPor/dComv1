@extends('welcome')

@section('content')

<div class="relative z-10 bg-cover" style="background-image: url(images/antenna.jpg)">
    <div class="container">
        <div class="justify-center row">
            <div class="w-full lg:w-5/6 xl:w-2/3">
                <div class="pt-48 pb-64 m-auto header-content">
                    <img class="m-auto" src="images/recurso1.png" alt="logo">
                    <ul class="flex flex-wrap justify-center">
                        <li><a class="mx-3 main-btn video-popup" href="https://www.youtube.com/watch?v=Cp834TamMfQ">VIDEO INSTITUCIONAL <i class="ml-2 lni lni-play"></i></a></li>
                    </ul>
                </div> <!-- header content -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
    <div class="absolute bottom-0 z-20 w-full h-auto -mb-1 header-shape">
        <img src="images/header-shape.svg" alt="shape">
    </div>
</div> <!-- header content -->  

<section id="service" class="relative services-area py-20">
    <div class="container">
        <div class="flex">
            <div class="w-full mx-4 lg:w-1/2">
                <div class="pb-10 section-title">
                    <h4 class="title text-blue-600">Servicios</h4>
                    <p class="text">Conectamos e integramos la region a través del desarrollo de la infraestructura de las comunicaciones y las telecomunicaciones</p>
                </div> <!-- section title -->
            </div>
        </div> <!-- row -->
        <div class="flex">
            <div class="w-full lg:w-2/3">
                <div class="row">
                    <div class="w-full md:w-1/2 ">
                        <div class="block mx-4 services-content sm:flex hover:bg-gray-100 ">
                            <div class="services-icon">
                                <i>
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="cogs" class="svg-inline--fa fa-cogs fa-w-20 w-16 h-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M512.1 191l-8.2 14.3c-3 5.3-9.4 7.5-15.1 5.4-11.8-4.4-22.6-10.7-32.1-18.6-4.6-3.8-5.8-10.5-2.8-15.7l8.2-14.3c-6.9-8-12.3-17.3-15.9-27.4h-16.5c-6 0-11.2-4.3-12.2-10.3-2-12-2.1-24.6 0-37.1 1-6 6.2-10.4 12.2-10.4h16.5c3.6-10.1 9-19.4 15.9-27.4l-8.2-14.3c-3-5.2-1.9-11.9 2.8-15.7 9.5-7.9 20.4-14.2 32.1-18.6 5.7-2.1 12.1.1 15.1 5.4l8.2 14.3c10.5-1.9 21.2-1.9 31.7 0L552 6.3c3-5.3 9.4-7.5 15.1-5.4 11.8 4.4 22.6 10.7 32.1 18.6 4.6 3.8 5.8 10.5 2.8 15.7l-8.2 14.3c6.9 8 12.3 17.3 15.9 27.4h16.5c6 0 11.2 4.3 12.2 10.3 2 12 2.1 24.6 0 37.1-1 6-6.2 10.4-12.2 10.4h-16.5c-3.6 10.1-9 19.4-15.9 27.4l8.2 14.3c3 5.2 1.9 11.9-2.8 15.7-9.5 7.9-20.4 14.2-32.1 18.6-5.7 2.1-12.1-.1-15.1-5.4l-8.2-14.3c-10.4 1.9-21.2 1.9-31.7 0zm-10.5-58.8c38.5 29.6 82.4-14.3 52.8-52.8-38.5-29.7-82.4 14.3-52.8 52.8zM386.3 286.1l33.7 16.8c10.1 5.8 14.5 18.1 10.5 29.1-8.9 24.2-26.4 46.4-42.6 65.8-7.4 8.9-20.2 11.1-30.3 5.3l-29.1-16.8c-16 13.7-34.6 24.6-54.9 31.7v33.6c0 11.6-8.3 21.6-19.7 23.6-24.6 4.2-50.4 4.4-75.9 0-11.5-2-20-11.9-20-23.6V418c-20.3-7.2-38.9-18-54.9-31.7L74 403c-10 5.8-22.9 3.6-30.3-5.3-16.2-19.4-33.3-41.6-42.2-65.7-4-10.9.4-23.2 10.5-29.1l33.3-16.8c-3.9-20.9-3.9-42.4 0-63.4L12 205.8c-10.1-5.8-14.6-18.1-10.5-29 8.9-24.2 26-46.4 42.2-65.8 7.4-8.9 20.2-11.1 30.3-5.3l29.1 16.8c16-13.7 34.6-24.6 54.9-31.7V57.1c0-11.5 8.2-21.5 19.6-23.5 24.6-4.2 50.5-4.4 76-.1 11.5 2 20 11.9 20 23.6v33.6c20.3 7.2 38.9 18 54.9 31.7l29.1-16.8c10-5.8 22.9-3.6 30.3 5.3 16.2 19.4 33.2 41.6 42.1 65.8 4 10.9.1 23.2-10 29.1l-33.7 16.8c3.9 21 3.9 42.5 0 63.5zm-117.6 21.1c59.2-77-28.7-164.9-105.7-105.7-59.2 77 28.7 164.9 105.7 105.7zm243.4 182.7l-8.2 14.3c-3 5.3-9.4 7.5-15.1 5.4-11.8-4.4-22.6-10.7-32.1-18.6-4.6-3.8-5.8-10.5-2.8-15.7l8.2-14.3c-6.9-8-12.3-17.3-15.9-27.4h-16.5c-6 0-11.2-4.3-12.2-10.3-2-12-2.1-24.6 0-37.1 1-6 6.2-10.4 12.2-10.4h16.5c3.6-10.1 9-19.4 15.9-27.4l-8.2-14.3c-3-5.2-1.9-11.9 2.8-15.7 9.5-7.9 20.4-14.2 32.1-18.6 5.7-2.1 12.1.1 15.1 5.4l8.2 14.3c10.5-1.9 21.2-1.9 31.7 0l8.2-14.3c3-5.3 9.4-7.5 15.1-5.4 11.8 4.4 22.6 10.7 32.1 18.6 4.6 3.8 5.8 10.5 2.8 15.7l-8.2 14.3c6.9 8 12.3 17.3 15.9 27.4h16.5c6 0 11.2 4.3 12.2 10.3 2 12 2.1 24.6 0 37.1-1 6-6.2 10.4-12.2 10.4h-16.5c-3.6 10.1-9 19.4-15.9 27.4l8.2 14.3c3 5.2 1.9 11.9-2.8 15.7-9.5 7.9-20.4 14.2-32.1 18.6-5.7 2.1-12.1-.1-15.1-5.4l-8.2-14.3c-10.4 1.9-21.2 1.9-31.7 0zM501.6 431c38.5 29.6 82.4-14.3 52.8-52.8-38.5-29.6-82.4 14.3-52.8 52.8z"></path></svg>
                                </i>
                            </div>
                            <div class="mb-8 ml-0 services-content media-body sm:ml-3">
                                <a href="{{ route('serv-commissions') }}" class="hover:text-blue-700 services-title text-gray-800 font-bold">Mantenimientos</a href="">
                                <p class="text">Comisiones de mantenimiento por parte personal de la Direccion de Comunicacines.</p>
                            </div>
                        </div> <!-- services content -->
                    </div>
                    <div class="w-full md:w-1/2">
                        <div class="block mx-4 services-content sm:flex hover:bg-gray-100">
                            <div class="services-icon">
                                <i>
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="broadcast-tower" class="svg-inline--fa fa-broadcast-tower fa-w-20 w-16 h-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M150.94 192h33.73c11.01 0 18.61-10.83 14.86-21.18-4.93-13.58-7.55-27.98-7.55-42.82s2.62-29.24 7.55-42.82C203.29 74.83 195.68 64 184.67 64h-33.73c-7.01 0-13.46 4.49-15.41 11.23C130.64 92.21 128 109.88 128 128c0 18.12 2.64 35.79 7.54 52.76 1.94 6.74 8.39 11.24 15.4 11.24zM89.92 23.34C95.56 12.72 87.97 0 75.96 0H40.63c-6.27 0-12.14 3.59-14.74 9.31C9.4 45.54 0 85.65 0 128c0 24.75 3.12 68.33 26.69 118.86 2.62 5.63 8.42 9.14 14.61 9.14h34.84c12.02 0 19.61-12.74 13.95-23.37-49.78-93.32-16.71-178.15-.17-209.29zM614.06 9.29C611.46 3.58 605.6 0 599.33 0h-35.42c-11.98 0-19.66 12.66-14.02 23.25 18.27 34.29 48.42 119.42.28 209.23-5.72 10.68 1.8 23.52 13.91 23.52h35.23c6.27 0 12.13-3.58 14.73-9.29C630.57 210.48 640 170.36 640 128s-9.42-82.48-25.94-118.71zM489.06 64h-33.73c-11.01 0-18.61 10.83-14.86 21.18 4.93 13.58 7.55 27.98 7.55 42.82s-2.62 29.24-7.55 42.82c-3.76 10.35 3.85 21.18 14.86 21.18h33.73c7.02 0 13.46-4.49 15.41-11.24 4.9-16.97 7.53-34.64 7.53-52.76 0-18.12-2.64-35.79-7.54-52.76-1.94-6.75-8.39-11.24-15.4-11.24zm-116.3 100.12c7.05-10.29 11.2-22.71 11.2-36.12 0-35.35-28.63-64-63.96-64-35.32 0-63.96 28.65-63.96 64 0 13.41 4.15 25.83 11.2 36.12l-130.5 313.41c-3.4 8.15.46 17.52 8.61 20.92l29.51 12.31c8.15 3.4 17.52-.46 20.91-8.61L244.96 384h150.07l49.2 118.15c3.4 8.16 12.76 12.01 20.91 8.61l29.51-12.31c8.15-3.4 12-12.77 8.61-20.92l-130.5-313.41zM271.62 320L320 203.81 368.38 320h-96.76z"></path></svg>
                                </i>
                            </div>
                            <div class="mb-8 ml-0 services-content media-body sm:ml-3">
                                <a href="{{ route('serv-estations') }}" class="hover:text-blue-700 services-title text-gray-800 font-bold">Estaciones CPAC</a>
                                <p class="text">Conoce las estaciones instaladas en la region Amazonas</p>
                            </div>
                        </div> <!-- services content -->
                    </div>
                    <div class="w-full md:w-1/2">
                        <div class="block mx-4 services-content sm:flex hover:bg-gray-100">
                            <div class="services-icon">
                                <i>
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="radiation" class="svg-inline--fa fa-radiation fa-w-16 w-16 h-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512"><path fill="currentColor" d="M328.2 255.8h151.6c9.1 0 16.8-7.7 16.2-16.8-5.1-75.8-44.4-142.2-102.5-184.2-7.4-5.3-17.9-2.9-22.7 4.8L290.4 188c22.6 14.3 37.8 39.2 37.8 67.8zm-37.8 67.7c-12.3 7.7-26.8 12.4-42.4 12.4-15.6 0-30-4.7-42.4-12.4L125.2 452c-4.8 7.7-2.4 18.1 5.6 22.4C165.7 493.2 205.6 504 248 504s82.3-10.8 117.2-29.6c8-4.3 10.4-14.8 5.6-22.4l-80.4-128.5zM248 303.8c26.5 0 48-21.5 48-48s-21.5-48-48-48-48 21.5-48 48 21.5 48 48 48zm-231.8-48h151.6c0-28.6 15.2-53.5 37.8-67.7L125.2 59.7c-4.8-7.7-15.3-10.2-22.7-4.8C44.4 96.9 5.1 163.3 0 239.1c-.6 9 7.1 16.7 16.2 16.7z"></path></svg>
                                </i>
                            </div>
                            <div class="mb-8 ml-0 services-content media-body sm:ml-3">
                                <a href="{{ route('serv-mediciones') }}" class="hover:text-blue-700 services-title text-gray-800 font-bold">Medicion de RNI</a>
                                <p class="text">Conoce las mediciones de radiacion no ionizantes que  de la region Amazonas</p>
                            </div>
                        </div> <!-- services content -->
                    </div>
                    <div class="w-full md:w-1/2">
                        <div class="block mx-4 services-content sm:flex hover:bg-gray-100">
                            <div class="services-icon">
                                <i>
                                    <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="chromecast" class="svg-inline--fa fa-chromecast fa-w-16 w-16 h-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M447.8,64H64c-23.6,0-42.7,19.1-42.7,42.7v63.9H64v-63.9h383.8v298.6H298.6V448H448c23.6,0,42.7-19.1,42.7-42.7V106.7 C490.7,83.1,471.4,64,447.8,64z M21.3,383.6L21.3,383.6l0,63.9h63.9C85.2,412.2,56.6,383.6,21.3,383.6L21.3,383.6z M21.3,298.6V341 c58.9,0,106.6,48.1,106.6,107h42.7C170.7,365.6,103.7,298.7,21.3,298.6z M213.4,448h42.7c-0.5-129.5-105.3-234.3-234.8-234.6l0,42.4 C127.3,255.6,213.3,342,213.4,448z"></path></svg>
                                </i>
                            </div>
                            <div class="mb-8 ml-0 services-content media-body sm:ml-3">
                                <a href="{{ route('serv-capacitations') }}" class="hover:text-blue-700 services-title text-gray-800 font-bold">Charlas</a>
                                <p class="text">Senzibilización denominada "Antenas Buena Onda"</p>
                            </div>
                        </div> <!-- services content -->
                    </div>
                </div> <!-- row -->
            </div> <!-- row -->
        </div> <!-- row -->
    </div> <!-- container -->
    <div class="services-image">
        <div class="rounded-md p-2 border-2 shadow-sm">
            <div class="w-full">
                <img class="rounded-md shadow-md" src="images/services.jpg" alt="Services">
            </div>
        </div>
    </div> <!-- services image -->
</section>



<!--====== SERVICES PART ENDS ======-->

<!--====== TESTIMONIAL THREE PART START ======-->

<section id="notice" class="testimonial-area py-20">
    <div class="container">            
        <div class="justify-center row">
            <div class="w-full mx-4 ">
                <div class="pb-10 text-center section-title">
                    <h4 class="title text-blue-600">Noticias y Eventos</h4>
                    <p class="text">Encuentra nuestra última información, notas de prensa, comunicados y más ...</p>
                </div> <!-- section title -->
            </div>
        </div> <!-- row -->
        
        <div class="row">
            <div class="w-full">
                <div class="row testimonial-active">
                    <div class="w-full lg:w-1/3">
                        <div class="single-testimonial">
                            <div class="w-full md:h-64 h-auto mb-2 py-2">
                                <img class="m-auto bg-cover" src="images/3333.jpg" alt="Author">
                            </div>
                            <div class="testimonial-content">
                                <h6 class="text-lg font-semibold my-2 text-blue-800 border-b border-gray-300">Isabela Moreira</h6>
                                <p class="text-justify mb-4 border-b border-gray-300">Stop wasting time and money designing and managing a website that doesn’t get results. Happiness guaranteed! Stop wasting time and money designing and managing a website that doesn’t get results. Happiness guaranteed!</p>
                                <h6 class="text-lg font-semibold text-gray-900">Isabela Moreira</h6>
                                <span class="text-sm text-gray-700">CEO, GrayGrids</span>
                            </div>
                        </div> <!-- single testimonial -->
                    </div>
                    <div class="w-full lg:w-1/3">
                        <div class="single-testimonial">
                            <div class="w-full md:h-64 h-auto mb-2 py-2">
                                <img class="m-auto bg-cover" src="images/4444.jpg" alt="Author">
                            </div>
                            <div class="testimonial-content">
                                <h6 class="text-lg font-semibold my-2 text-blue-800 border-b border-gray-300">Isabela Moreira</h6>
                                <p class="text-justify mb-4 border-b border-gray-300">Stop wasting time and money designing and managing a website that doesn’t get results. Happiness guaranteed! Stop wasting time and money designing and managing a website that doesn’t get results. Happiness guaranteed!</p>
                                <h6 class="text-left text-lg font-semibold text-gray-900">Isabela Moreira</h6>
                                <span class="text-left text-sm text-gray-700">CEO, GrayGrids</span>
                            </div>
                        </div> <!-- single testimonial -->
                    </div>
                    <div class="w-full lg:w-1/3">
                        <div class="single-testimonial">
                            <div class="w-full md:h-64 h-auto mb-2 py-2">
                                <img class="m-auto bg-cover" src="images/a.jpg" alt="Author">
                            </div>
                            <div class="testimonial-content">
                                <h6 class="text-lg font-semibold my-2 text-blue-800 border-b border-gray-300">Isabela Moreira</h6>
                                <p class="text-justify mb-4 border-b border-gray-300">Stop wasting time and money designing and managing a website that doesn’t get results. Happiness guaranteed! Stop wasting time and money designing and managing a website that doesn’t get results. Happiness guaranteed!</p>
                                <h6 class="text-lg font-semibold text-gray-900">Isabela Moreira</h6>
                                <span class="text-sm text-gray-700">CEO, GrayGrids</span>
                            </div>
                        </div> <!-- single testimonial -->
                    </div>
                    <div class="w-full lg:w-1/3">
                        <div class="single-testimonial">
                            <div class="w-full md:h-64 h-auto mb-2 py-2">
                                <img class="m-auto bg-cover" src="images/a.jpg" alt="Author">
                            </div>
                            <div class="testimonial-content">
                                <h6 class="text-lg font-semibold my-2 text-blue-800 border-b border-gray-300">Isabela Moreira</h6>
                                <p class="text-justify mb-4 border-b border-gray-300">Stop wasting time and money designing and managing a website that doesn’t get results. Happiness guaranteed! Stop wasting time and money designing and managing a website that doesn’t get results. Happiness guaranteed!</p>
                                <h6 class="text-lg font-semibold text-gray-900">Isabela Moreira</h6>
                                <span class="text-sm text-gray-700">CEO, GrayGrids</span>
                            </div>
                        </div> <!-- single testimonial -->
                    </div>
                </div> <!-- row -->
            </div>
        </div> <!-- row -->
        <div class="text-center pricing-btn mt-20">
            <a class="main-btn" href="{{ route('notices') }}">Ver mas</a>
        </div>
    </div> <!-- container -->
</section>

<!--====== TESTIMONIAL THREE PART ENDS ======-->

<!--====== PRICING PART START ======-->

<section id="institucion" class="bg-gray-100 pricing-area py-10">
    <div class="container">
        <div class="justify-center row">
            <div class="w-full mx-4 lg:w-1/2">
                <div class="pb-6 text-center section-title">
                    <h3 class="title text-blue-600">Información Institucional</h3>
                    <p class="text">Conoce más a la Dirección de Comunicaciones de Amazonas</p>
                </div> <!-- section title -->
            </div>
        </div> <!-- row -->
        <div class="justify-center row">
            <div class="w-full mx-60">
                <div class="">
                    <div class="mb-6 pricing-list">
                        <ul>
                            <li class="text-center shadow-lg"></i> Órgano de línea de la Dirección Regional de Transportes y Comunicaciones, es el ente que promueve, ejecuta,
                                dirige y controla los planes y políticas en materia de comunicaciones en la región Amazonas, de conformidad con las políticas nacionales
                                y los planes sectoriales.
                            </li>
                        </ul>
                    </div>
                </div> 
            </div>

            <div class="w-full sm:w-3/4 md:w-3/4 lg:w-1/2">
                <div class="single-pricing">
                    <div class="text-center pricing-header">
                        <h5 class="sub-title">Funciones</h5>
                    </div>
                    <div class="mb-20 pricing-list">
                        <ul>
                            <li><i class="lni lni-checkmark-circle"></i> Formular y administrar los planes y políticas de telecomunicaciones de la región</li>
                            <li><i class="lni lni-checkmark-circle"></i> Promoción y Regulación de los servicios de Telecomunicaciones</li>
                            <li><i class="lni lni-checkmark-circle"></i> Control y Supervisión del espectro radioeléctrico</li>
                            <li><i class="lni lni-checkmark-circle"></i> Mediciones de radiaciones No Ionizantes a las antenas de los servicios de la Telecomunicación</li>
                            <li><i class="lni lni-checkmark-circle"></i> Promover y ejecutar los proyectos regionales de telecomunicaciones</li>
                            <li><i class="lni lni-checkmark-circle"></i> Fomentar y fortalecer el desarrollo de medios de comunicaciones regional.</li>
                            <li><i class="lni lni-checkmark-circle"></i> Mantenimiento de la infraestructura de telecomunicación rurales en la Region Amazonas</li>
                            <li><i class="lni lni-checkmark-circle"></i> Difusión de la normativa vigente en materia de telecomunicaciones</li>
                        </ul>
                    </div>
                    {{-- <div class="text-center pricing-btn">
                        <a class="main-btn" href="javascript:void(0)">Ver mas</a>
                    </div> --}}
                    <div class="bottom-shape">
                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 350 112.35"><defs><style>.color-1{fill:#2bdbdc;isolation:isolate;}.cls-1{opacity:0.1;}.cls-2{opacity:0.2;}.cls-3{opacity:0.4;}.cls-4{opacity:0.6;}</style></defs><g id="bottom-part"><g id="Group_747" data-name="Group 747"><path id="Path_294" data-name="Path 294" class="cls-1 color-1" d="M0,24.21c120-55.74,214.32,2.57,267,0S349.18,7.4,349.18,7.4V82.35H0Z" transform="translate(0 0)"/><path id="Path_297" data-name="Path 297" class="cls-2 color-1" d="M350,34.21c-120-55.74-214.32,2.57-267,0S.82,17.4.82,17.4V92.35H350Z" transform="translate(0 0)"/><path id="Path_296" data-name="Path 296" class="cls-3 color-1" d="M0,44.21c120-55.74,214.32,2.57,267,0S349.18,27.4,349.18,27.4v74.95H0Z" transform="translate(0 0)"/><path id="Path_295" data-name="Path 295" class="cls-4 color-1" d="M349.17,54.21c-120-55.74-214.32,2.57-267,0S0,37.4,0,37.4v74.95H349.17Z" transform="translate(0 0)"/></g></g></svg>
                    </div>
                </div> <!-- single pricing -->
            </div>

            <div class="w-full sm:w-3/4 md:w-3/4 lg:w-1/2">
                <div class="single-pricing">
                    <div class="text-center pricing-header">
                        <h5 class="sub-title">Objetivos</h5>
                    </div>
                    <div class="mb-72 pricing-list">
                        <ul>
                            <li><i class="lni lni-checkmark-circle"></i> Promover, ejecutar, y evaluar con eficiencia las actividades de mantenimiento y supervisión de la infraestructura de telecomunicaciones</li>                         
                            <li><i class="lni lni-checkmark-circle"></i> Generar valor agregado para las diversas actividades económicas y sociales de la región Amazonas</li>
                            <li><i class="lni lni-checkmark-circle"></i> Velar por los servicios de comunicacion se brinden de manera eficiente y sostenible en la región Amazonas.</li>
                        </ul>
                    </div>
                    {{-- <div class="text-center pricing-btn">
                        <a class="main-btn" href="javascript:void(0)">Ver mas</a>
                    </div> --}}
                    <div class="bottom-shape">
                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 350 112.35"><defs><style>.color-2{fill:#0067f4;isolation:isolate;}.cls-1{opacity:0.1;}.cls-2{opacity:0.2;}.cls-3{opacity:0.4;}.cls-4{opacity:0.6;}</style></defs><title>bottom-part1</title><g id="bottom-part"><g id="Group_747" data-name="Group 747"><path id="Path_294" data-name="Path 294" class="cls-1 color-2" d="M0,24.21c120-55.74,214.32,2.57,267,0S349.18,7.4,349.18,7.4V82.35H0Z" transform="translate(0 0)"/><path id="Path_297" data-name="Path 297" class="cls-2 color-2" d="M350,34.21c-120-55.74-214.32,2.57-267,0S.82,17.4.82,17.4V92.35H350Z" transform="translate(0 0)"/><path id="Path_296" data-name="Path 296" class="cls-3 color-2" d="M0,44.21c120-55.74,214.32,2.57,267,0S349.18,27.4,349.18,27.4v74.95H0Z" transform="translate(0 0)"/><path id="Path_295" data-name="Path 295" class="cls-4 color-2" d="M349.17,54.21c-120-55.74-214.32,2.57-267,0S0,37.4,0,37.4v74.95H349.17Z" transform="translate(0 0)"/></g></g></svg>                        </div>
                </div> <!-- single pricing -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== PRICING PART ENDS ======-->

<!--====== CONTACT PART START ======-->

<section id="contact" class="contact-area py-20 m-auto">
    <div class="container">
        <div class="justify-center row">
            <div class="w-full mx-4 lg:w-1/2">
                <div class="pb-10 text-center section-title">
                    <h4 class="title text-blue-600">Contáctanos</h4>
                    <div class="w-full">
                        <div class="flex justify-center single-client">
                            <img src="images/gestion.png" alt="Logo">
                        </div> <!-- single client -->
                    </div>
                    <p class="text-blue-800 font-bold text-lg">Dirección Regional de Transportes y Comunicaciones - Amazonas</p>
                </div> <!-- section title -->
            </div>
        </div> <!-- row -->
        <div class="justify-center row">
            <div class="w-full lg:w-2/3">
                <div class="contact-form">
                    <form id="contact-form" action="contact.php" method="post" data-toggle="validator">
                        <div class="row">
                            <div class="w-full md:w-1/2">
                                <div class="mx-4 mb-6 single-form form-group">
                                    <input type="text" name="name" placeholder="Tu nombre completo" data-error="Name is required." required="required">
                                </div> <!-- single form -->
                            </div>
                            <div class="w-full md:w-1/2">
                                <div class="mx-4 mb-6 single-form form-group">
                                    <input type="email" name="email" placeholder="Tu email" data-error="Valid email is required." required="required">
                                </div> <!-- single form -->
                            </div>
                            <div class="w-full md:w-1/2">
                                <div class="mx-4 mb-6 single-form form-group">
                                    <input type="text" name="subject" placeholder="Asunto" data-error="Subject is required." required="required">
                                </div> <!-- single form -->
                            </div>
                            <div class="w-full md:w-1/2">
                                <div class="mx-4 mb-6 single-form form-group">
                                    <input type="text" name="phone" placeholder="Telefono" data-error="Phone is required." required="required">
                                </div> <!-- single form -->
                            </div>
                            <div class="w-full">
                                <div class="mx-4 mb-6 single-form form-group">
                                    <textarea rows="5" placeholder="Tu mensaje" name="message" data-error="Please, leave us a message." required="required"></textarea>
                                </div> <!-- single form -->
                            </div>
                            <p class="mx-4 form-message"></p>
                            <div class="w-full">
                                <div class="text-center pricing-btn">
                                    <a class="main-btn" href="javascript:void(0)">Enviar</a>
                                </div>
                            </div>
                        </div> <!-- row -->
                    </form>
                </div> <!-- row -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

@endsection