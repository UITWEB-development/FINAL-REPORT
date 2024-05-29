<nav class="grid gap-4 lg:gap-8 mt-4" >
    <a class=" group aspect-h-10 aspect-w-16 relative overflow-hidden rounded-2xl bg-black/25 transition hover:ring-4 hover:ring-[#cd853f] active:opacity-75">
        <img class="object-cover" src="{{ asset('storage/'.$product->image_path) }}"/>
        <div class="cursor-pointer absolute inset-0 flex  justify-between bg-gradient-to-b from-transparent via-black/60 to-black">
            <div class="flex items-end justify-between gap-2 px-4 py-5">
                <div class="cursor-pointer flex h-10 w-10 items-center justify-center rounded-full bg-slate-500/25 text-slate-400 transition group-hover:scale-110 group-hover:{{$product->is_available ? 'bg-[#64c859]' : 'bg-[#7e7d7d] '}} group-hover:text-white group-active:scale-100 absolute top-4 left-4">
                    @svg($product->is_available ? 'instock' : 'outofstock', 'i-mini hi-play h-5 w-5')
                </div>
                <div class="space-y-1">
                    <h3 class="text-lg font-semibold text-white ">{{ $product->name }}</h3>
                    <p class="text-sm font-semibold text-[#e1e0e2]">{{ $product->price }}</p>
                </div>
                <div wire:click="$dispatch('openModal', { component: 'edit-product', arguments: { product : '{{$product->id}}' }})" class="cursor-pointer flex h-10 w-10 items-center justify-center rounded-full bg-slate-500/25 text-slate-400 transition group-hover:scale-110 group-hover:bg-[#da9858] group-hover:text-white group-active:scale-100 absolute bot-4 right-4">
                    @svg('edit', 'hi-mini hi-play h-5 w-5')                      
                </div>
                <div wire:click="$dispatch('openModal', { component: 'delete-product', arguments: { product: '{{$product->id}}' }})" class="cursor-pointer flex h-10 w-10 items-center justify-center rounded-full bg-slate-500/25 text-slate-400 transition group-hover:scale-110 group-hover:bg-[#e81123] group-hover:text-white group-active:scale-100 absolute top-4 right-4">
                    @svg('trash', 'hi-mini hi-play h-5 w-5')       
                </div>
            </div>
        </div>
    </a>
</nav>
