<div class="flex items-center gap-4 rounded p-5 lg:gap-8">
    <div wire:click="update(-1)" class="cursor-pointer flex items-center font-bold text-dark  transition {{$selected_category === -1 ? 'text-[#e49f56]  ' : 'hover:text-[#da9858] active:text-[#9b4b14]'}} text-xl">
        <span>All</span>
    </div>

    @foreach ($categories as $category)
        <div  wire:key="{{ $category->id }}"  wire:click="update({{ $category->id }})" class="cursor-pointer flex items-center font-bold text-dark transition {{$selected_category === $category->id ? 'text-[#e49f56]' : 'hover:text-[#da9858] active:text-[#9b4b14]'}} text-xl">
            <span>{{ $category->name}}</span>
        </div>
    @endforeach

</div>
