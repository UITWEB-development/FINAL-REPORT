<form @submit.prevent class="w-60 sm:w-64 lg:w-80 xl:w-96">
    <div class="relative">
        <div
            class="absolute bottom-0 start-0 top-0 flex w-14 items-center justify-center bg-[#da9858] rounded-s-lg">
            @svg('fas-search', 'h-5 w-5')
        </div>
        <input type="text"
            class="block w-full rounded-lg border-transparent bg-white py-[0.7rem] pe-5 ps-16 text-sm leading-5 placeholder:text-slate-400  ring-slate-300 ring-1  hover:border-transparent focus:border-transparent focus:ring-slate-500 focus:ring-1"
            id="search" name="search" placeholder="Search.." wire:model='search' @input.prevent.debounce.300ms="$wire.update()" />
    </div>
</form>