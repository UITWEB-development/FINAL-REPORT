<div>
    {{-- New restaurants --}}
    @teleport('#search-container')
        <input wire:model='search' @input.prevent.debounce.300ms="$wire.update()"
            class="w-full rounded-xl border border-slate-300 bg-slate-100 py-2.5 pl-10 pr-2 text-sm focus:border-[#c8835f] focus:ring focus:ring-[#ea580c] focus:ring-opacity-50 disabled:cursor-not-allowed disabled:opacity-75 dark:border-slate-700 dark:bg-slate-800/50" />
    @endteleport

    <div class="w-full pt-2 flex justify-between  border-black border-b-2 ">
        <p class="text-[4cqmin] font-bold pl-4">All restaurants</p>
    </div>
    <nav class="p-5 gap-4  mt-4 grid grid-cols-1  sm:grid-cols-2 lg:grid-cols-3 lg:gap-8">
        @foreach ($restaurants as $restaurant)
            <livewire:restaurant-card :$restaurant :key="$restaurant->id"></livewire:restaurant-card>
        @endforeach
    </nav>

    <div class="flex justify-center items-center pb-10">{{ $restaurants->links() }}</div>
</div>
