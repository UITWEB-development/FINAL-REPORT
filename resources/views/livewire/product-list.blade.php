<div wire:poll>
    <ul class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 lg:gap-8 ">
        @foreach ($products as $product)
            <livewire:product-card :$product :key="$product->id"></livewire:product-card>
        @endforeach
    </ul>
    <div >
        @teleport('#categories')
            <div class="px-5">{{ $products->links() }}</div> 
        @endteleport
    </div>
    
</div>
