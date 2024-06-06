<div>
    <nav wire:poll class="p-5 gap-4 mt-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 lg:gap-8">
        @foreach ($products as $product)
            <livewire:restaurant-product-card :$product :key="$product->id"></livewire:restaurant-product-card>
        @endforeach
    
        
    </nav>
    <div class="flex justify-center items-center pt-5 pb-10">{{ $products->links() }}</div>  
</div>

