<div>
    <h1 class="mr-5 text-lg font-bold text-green-800 text-center">GALERIA DE FOTOS</h1>
    <div class="mx-auto px-2 md:px-6 2xl:px-0 flex justify-center items-center bg-gray-50">
        <div class="flex flex-col jusitfy-start items-start">
            <div class="grid grid-cols-2 gap-x-8 gap-y-10 lg:gap-y-0 items-center">
                @foreach ($informe->activities as $item)
                    @foreach ($item->images as $item)
                    <div class="flex flex-col m-2">
                        <div class="group relative">
                            <img class="hover:bg-opacity-50 shadow-xl rounded-md sm:block lg:"
                                src="{{ Storage::url($item->url) }}" alt="bag" />
                            <div class=" absolute rounded bg-opacity-0 w-full  top-0 flex items-center duration-700 transition justify-end">
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
</div>
