<div>
    <div class="py-5 relative">
        <div class="w-full px-4 md:px-5 l mx-auto">
            <div class="rounded-3xl p-4 lg:p-3 mb-8 max-lg:w-full max-lg:mx-auto gap-y-4">
                {{-- <img src="{{ asset('storage/' . $restaurant->image_path) }}" alt="speaker image" class="w-full h-[60%]"> --}}
                <h1 class="text-center mt-2 font-bold whitespace-nowrap text-[4cqmin]">
                    {{ $restaurant->restaurant_description->restaurant_name }}</h1>
                <div class="flex flex-row justify-center">
                    <!-- Your SVG icons here -->
                </div>
                <div
                    class="w-full flex-col lg:flex-row lg:items-center gap-10 mb-1 mx-2 2xl:mt-0 xl:mt-2 lg:mt-1 mt-3 md:flex-col">
                    <div class=" flex flex-row justify-between items-center w-full">
                        <div class="flex flex-row gap-3 items-center">
                            <!-- Phone icon -->
                            <span class="text-[3cqmin]">{{ $restaurant->restaurant_description->phone_number }}</span>
                        </div>
                        <div class="flex flex-row gap-3 items-center ml-auto">
                            <!-- Clock icon -->
                            <span class="text-[3cqmin]">{{ $restaurant->restaurant_description->opening_time }} -
                                {{ $restaurant->restaurant_description->closing_time }}</span>
                        </div>
                    </div>
                    <div class=" flex  lg:flex-row lg:justify-between mt-2 lg:mt-0">
                        <div class="flex flex-row gap-3 items-center">
                            <!-- Location icon -->
                            <span class="text-[3cqmin]">{{ $restaurant->restaurant_description->address }}</span>
                        </div>
                        <div class="flex flex-row gap-3 items-center ml-auto">
                            <a wire:click.prevent.stop="$dispatch('openModal', { component: 'restaurant-google-map', arguments: { restaurant : '{{$restaurant->id}}' }})" href="" class="text-[3cqmin] hover:text-orange-600 active:text-orange-600">View on Google Map</a>
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
            <livewire:select-category></livewire:select-category>
        </div>
        <div class="order-1 md:order-2 md:mt-0 ml-4 mr-4">
            <livewire:search-product></livewire:search-product>
        </div>
    </div>

    <livewire:restaurant-product-list :$restaurant></livewire:restaurant-product-list>
</div>
