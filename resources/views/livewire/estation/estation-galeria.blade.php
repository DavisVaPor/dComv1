<div>
    <div class="mx-auto rounded-md  py-8 justify-center md:grid-cols-3 grid grid-cols-1 gap-2 ">
        @foreach ($estation->activities as $item)
            @foreach ($item->images as $item)
            <div class="bg-white w-90 shadow-2xl rounded-xl">
                <div class="p-2">
                    <div class="group relative">
                        <img class="hover:bg-opacity-50 shadow-xl rounded-md w-full m-auto"
                            src="{{ Storage::url($item->url) }}"/>
                    </div>
                </div>
            </div>
            @endforeach
        @endforeach
    </div>
</div>
