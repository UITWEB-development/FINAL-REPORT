<a wire:click.stop="viewRestaurant"
    class=" group aspect-h-10 aspect-w-16 relative overflow-hidden rounded-2xl bg-black/25 transition hover:ring-4 hover:ring-[#cd853f] active:opacity-75">
    <img class="object-cover"
        src="https://th.bing.com/th/id/R.4038c562cfc67bf6421a148e7c4ac4d8?rik=Q%2f%2fOp4yxjuMcjg&pid=ImgRaw&r=0" />
    <div class="cursor-pointer absolute inset-0 flex  justify-between bg-gradient-to-b from-transparent  to-black ">
        <div class="flex items-end justify-between gap-2 px-4 py-5">
            <div
                class="space-y-1 transition group-hover:scale-105 text-white group-hover:text-yellow-600 group-active:scale-100">
                <h3 class=" text-2xl font-semibold  ">{{ $restaurant->restaurant_description->restaurant_name }}</h3>
            </div>
        </div>
    </div>
</a>
