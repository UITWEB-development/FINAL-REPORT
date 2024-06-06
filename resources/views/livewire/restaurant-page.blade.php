<div>
    <div class="py-5 relative">
        <div class="w-full px-4 md:px-5 l mx-auto">
            <div class="rounded-3xl p-4 lg:p-3 mb-8 max-lg:w-full max-lg:mx-auto gap-y-4">
                <img src="{{ asset('storage/' . $restaurant->image_path) }}" alt="speaker image" class="w-full h-[60%]">
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
                            <a href="" class="text-[3cqmin]">View on Google Map</a>
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

    <nav class="p-5 gap-4 mt-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 lg:gap-8">
        <!-- Restaurant cards -->
        <a
            class="group aspect-h-10 aspect-w-16 relative overflow-hidden rounded-2xl bg-black/25 transition hover:ring-4 hover:ring-[#cd853f] active:opacity-75">
            <img class="object-cover"
                src="https://th.bing.com/th/id/R.4038c562cfc67bf6421a148e7c4ac4d8?rik=Q%2f%2fOp4yxjuMcjg&pid=ImgRaw&r=0" />
            <div
                class="cursor-pointer absolute inset-0 flex justify-between bg-gradient-to-b from-transparent to-black">
                <div
                    class="space-y-1 transition group-hover:scale-105 text-white group-hover:text-yellow-600 group-active:scale-100 absolute bottom-3 left-3">
                    <h3 class="text-2xl font-semibold">Nhà hàng Vạn Huê Lầu</h3>
                    <p class="text-sm font-semibold text-[#e1e0e2]">2500000</p>
                </div>
            </div>
        </a>

        <a
            class="group aspect-h-10 aspect-w-16 relative overflow-hidden rounded-2xl bg-black/25 transition hover:ring-4 hover:ring-[#cd853f] active:opacity-75">
            <img class="object-cover"
                src="https://th.bing.com/th/id/R.4038c562cfc67bf6421a148e7c4ac4d8?rik=Q%2f%2fOp4yxjuMcjg&pid=ImgRaw&r=0" />
            <div
                class="cursor-pointer absolute inset-0 flex justify-between bg-gradient-to-b from-transparent to-black">
                <div
                    class="space-y-1 transition group-hover:scale-105 text-white group-hover:text-yellow-600 group-active:scale-100 absolute bottom-3 left-3">
                    <h3 class="text-2xl font-semibold">Nhà hàng Vạn Huê Lầu</h3>
                    <p class="text-sm font-semibold text-[#e1e0e2]">2500000</p>
                </div>
            </div>
        </a>

        <a
            class="group aspect-h-10 aspect-w-16 relative overflow-hidden rounded-2xl bg-black/25 transition hover:ring-4 hover:ring-[#cd853f] active:opacity-75">
            <img class="object-cover"
                src="https://th.bing.com/th/id/R.4038c562cfc67bf6421a148e7c4ac4d8?rik=Q%2f%2fOp4yxjuMcjg&pid=ImgRaw&r=0" />
            <div
                class="cursor-pointer absolute inset-0 flex justify-between bg-gradient-to-b from-transparent to-black">
                <div
                    class="space-y-1 transition group-hover:scale-105 text-white group-hover:text-yellow-600 group-active:scale-100 absolute bottom-3 left-3">
                    <h3 class="text-2xl font-semibold">Nhà hàng Vạn Huê Lầu</h3>
                    <p class="text-sm font-semibold text-[#e1e0e2]">2500000</p>
                </div>
            </div>
        </a>

        <a
            class="group aspect-h-10 aspect-w-16 relative overflow-hidden rounded-2xl bg-black/25 transition hover:ring-4 hover:ring-[#cd853f] active:opacity-75">
            <img class="object-cover"
                src="https://th.bing.com/th/id/R.4038c562cfc67bf6421a148e7c4ac4d8?rik=Q%2f%2fOp4yxjuMcjg&pid=ImgRaw&r=0" />
            <div
                class="cursor-pointer absolute inset-0 flex justify-between bg-gradient-to-b from-transparent to-black">
                <div
                    class="space-y-1 transition group-hover:scale-105 text-white group-hover:text-yellow-600 group-active:scale-100 absolute bottom-3 left-3">
                    <h3 class="text-2xl font-semibold">Nhà hàng Vạn Huê Lầu</h3>
                    <p class="text-sm font-semibold text-[#e1e0e2]">2500000</p>
                </div>
            </div>
        </a>

        <a
            class="group aspect-h-10 aspect-w-16 relative overflow-hidden rounded-2xl bg-black/25 transition hover:ring-4 hover:ring-[#cd853f] active:opacity-75">
            <img class="object-cover"
                src="https://th.bing.com/th/id/R.4038c562cfc67bf6421a148e7c4ac4d8?rik=Q%2f%2fOp4yxjuMcjg&pid=ImgRaw&r=0" />
            <div
                class="cursor-pointer absolute inset-0 flex justify-between bg-gradient-to-b from-transparent to-black">
                <div
                    class="space-y-1 transition group-hover:scale-105 text-white group-hover:text-yellow-600 group-active:scale-100 absolute bottom-3 left-3">
                    <h3 class="text-2xl font-semibold">Nhà hàng Vạn Huê Lầu</h3>
                    <p class="text-sm font-semibold text-[#e1e0e2]">2500000</p>
                </div>
            </div>
        </a>

        <a
            class="group aspect-h-10 aspect-w-16 relative overflow-hidden rounded-2xl bg-black/25 transition hover:ring-4 hover:ring-[#cd853f] active:opacity-75">
            <img class="object-cover"
                src="https://th.bing.com/th/id/R.4038c562cfc67bf6421a148e7c4ac4d8?rik=Q%2f%2fOp4yxjuMcjg&pid=ImgRaw&r=0" />
            <div
                class="cursor-pointer absolute inset-0 flex justify-between bg-gradient-to-b from-transparent to-black">
                <div
                    class="space-y-1 transition group-hover:scale-105 text-white group-hover:text-yellow-600 group-active:scale-100 absolute bottom-3 left-3">
                    <h3 class="text-2xl font-semibold">Nhà hàng Vạn Huê Lầu</h3>
                    <p class="text-sm font-semibold text-[#e1e0e2]">2500000</p>
                </div>
            </div>
        </a>
    </nav>
</div>
