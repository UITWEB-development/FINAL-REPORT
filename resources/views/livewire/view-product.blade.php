
<div class="w-full max-w-6xl bg-white flex items-center p-5 lg:p-10 overflow-hidden relative">
    <div class="w-full max-w-6xl  bg-white  p-5  mx-auto text-gray-800 relative md:text-left">
        <div class="md:flex items-center -mx-10">
            <div class="w-full md:w-1/2 px-5   mb-10 md:mb-0">
                <div class="relative">
                    <img src="{{ asset('storage/'.$product->image_path) }}" class="max-h-72 w-auto relative z-10" alt="">
                </div>
            </div>
            <div class="w-full md:w-1/2 px-5 pt-0">
                <div class="mb-5">
                    <div class="text-container overflow-y-auto max-h-52 overflow-x-hidden">
                        <h1 class="font-bold uppercase text-2xl mb-5 ">
                          {{$product->name}}
                        </h1>
                 
                        <p class="text-sm">{{ $product->description }}</p>
                    </div>
                </div>
                <div class="pb-2">
                    <div class="inline-block align-bottom mr-5">
                        <span class="text-lg {{ $product->is_available ? 'text-green-400' : 'text-red-400'}} font-bold leading-none align-baseline">{{ $product->is_available ? 'Available' : 'Out of stock'}}</span>
                    </div>
                </div>
                <div>
                    <div class="inline-block align-bottom mr-5">
                        <span class="font-bold text-3xl leading-none align-baseline">{{$product->price}}</span>
                        <span class="text-xl font-bold leading-none align-baseline">VND</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


