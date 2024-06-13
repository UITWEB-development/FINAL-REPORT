<div>
    <div class="py-5 relative">
        <div class="w-full px-4 md:px-5 l mx-auto">
            <div class="rounded-3xl p-4 lg:p-3 mb-2 max-lg:w-full max-lg:mx-auto ">
                <div
                    class="w-full flex-col lg:flex-row lg:items-center gap-10 mb-1 mx-2 2xl:mt-0 xl:mt-2 lg:mt-1 mt-3 md:flex-col">
                    <div class="flex flex-row gap-3 items-center ml-auto">
                        <img src="{{ asset('storage/' . $restaurant->image_path) }}" alt="speaker image"
                            class="w-full max-w-[60px] h-auto sm:max-w-[80px] sm:h-[80px] md:max-w-[100px] md:h-[100px] lg:max-w-[120px] lg:h-[120px] rounded-full">
                        <div>
                            <h1
                                class="text-center mt-2 font-bold whitespace-nowrap text-[4cqmin] sm:text-[3cqmin] md:text-[4cqmin] lg:text-[5cqmin]">
                                {{ $restaurant->restaurant_description->restaurant_name }}</h1>

                            <a wire:click.prevent.stop="$dispatch('openModal', { component: 'restaurant-google-map', arguments: { restaurant : '{{$restaurant->id}}' }})"
                                href=""
                                class="text-[2.8cqmin] underline text-gray-400 hover:text-orange-600 active:text-orange-600">View
                                details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Restaurant --}}
    <hr>
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mt-4">
        <div id="categories" class="flex items-center order-2 md:order-1">
            <livewire:restaurant-select-category></livewire:restaurant-select-category>
        </div>
        <div class="order-1 md:order-2 md:mt-0 ml-4 mr-4">
            <livewire:restaurant-search-product></livewire:restaurant-search-product>
        </div>
    </div>

    <livewire:restaurant-product-list :$restaurant></livewire:restaurant-product-list>
</div>

