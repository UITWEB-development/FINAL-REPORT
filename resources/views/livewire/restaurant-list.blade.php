<div>
    {{-- New restaurants --}}
    <div class="w-full pt-2 flex justify-between  border-black border-b-2 ">
        <p class="text-[4cqmin] font-bold pl-4">All restaurants</p>
    </div>
    <nav class="p-5 gap-4  mt-4 grid grid-cols-1  sm:grid-cols-2 lg:grid-cols-3 lg:gap-8">
        @foreach ($restaurants as $restaurant)
        <livewire:restaurant-card :$restaurant :key="$restaurant->id"></livewire:restaurant-card>
        @endforeach
    </nav>
</div>
