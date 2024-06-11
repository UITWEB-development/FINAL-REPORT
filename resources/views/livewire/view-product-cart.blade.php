<div class="w-full max-w-6xl bg-white flex items-center p-5 lg:p-10 overflow-hidden relative">
    <div class="w-full max-w-6xl  bg-white  p-5  mx-auto text-gray-800 relative md:text-left">
        <div class="md:flex items-center -mx-10">
            <div class="w-full md:w-1/2 px-5   mb-10 md:mb-0">
                <div class="relative">
                    <img src="{{ asset('storage/' . $product->image_path) }}" class="max-h-72 w-auto relative z-10"
                        alt="">
                </div>
            </div>
            <div class="w-full md:w-1/2 px-5 pt-0">
                <div class="mb-5">
                    <div class="text-container overflow-y-auto max-h-52 overflow-x-hidden">
                        <h1 class="font-bold uppercase text-2xl mb-5 ">
                            {{ $product->name }}
                        </h1>

                        <p class="text-sm">{{ $product->description }}</p>
                    </div>
                </div>
                <div class="pb-2">
                    <div class="inline-block align-bottom mr-5">
                        <span
                            class="text-lg {{ $product->is_available ? 'text-green-400' : 'text-red-400' }} font-bold leading-none align-baseline">{{ $product->is_available ? 'Available' : 'Out of stock' }}</span>
                    </div>
                </div>
                <div>
                    <div class="inline-block align-bottom mr-5">
                        <span class="font-bold text-3xl leading-none align-baseline">{{ number_format($product->price, 0, ',', '.') }}</span>
                        <span class="text-xl font-bold leading-none align-baseline">VND</span>
                    </div>
                </div>
                @if ($product->is_available)
                    <form wire:submit="addToCart" x-data="{ number: $wire.entangle('quantity') }" class="pt-1">
                        <div class="flex items-center justify-between pt-3">
                            <div class="flex items-center border-gray-100">
                                <span @click="if(number > 1) number--"
                                    class="cursor-pointer rounded-l bg-gray-100 py-1 px-3.5 duration-100 hover:bg-blue-500 hover:text-blue-50 select-none">
                                    - </span>
                                <input class="no-spinners h-8 w-10 border bg-white text-center text-xs outline-none"
                                    type="number" value="2" min="1" x-model="number" />
                                <span @click="number++"
                                    class="cursor-pointer rounded-r bg-gray-100 py-1 px-3 duration-100 hover:bg-blue-500 hover:text-blue-50 select-none">
                                    + </span>
                            </div>
                            <button wire:loading.attr="disabled" wire:target="addToCart"
                                class="ml-1 custom-margin text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Add to cart
                            </button>
                        </div>
                    </form>
                @endif
                <style>
                    .no-spinners::-webkit-outer-spin-button,
                    .no-spinners::-webkit-inner-spin-button {
                        -webkit-appearance: none;
                        margin: 0;
                    }

                    .no-spinners {
                        -moz-appearance: textfield;
                    }

                    /* Class for custom margin */
                    .custom-margin {
                        margin-left: 0.5rem;
                        /* Adjust the value as needed */
                    }
                </style>
            </div>
        </div>
    </div>
</div>
