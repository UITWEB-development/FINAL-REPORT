<nav class="grid gap-4 lg:gap-8 mt-4" >
    <a class=" group aspect-h-10 aspect-w-16 relative overflow-hidden rounded-2xl bg-black/25 transition hover:ring-4 hover:ring-[#cd853f] active:opacity-75">
        <img class="object-cover" src="{{ asset('storage/'.$product->image_path) }}"/>
        <div class="cursor-pointer absolute inset-0 flex  justify-between bg-gradient-to-b from-transparen to-black/80">
       
            <div class="flex items-end justify-between gap-2 px-4 py-5">
                <div class="space-y-1">
                    <h3 class="text-lg font-semibold text-white ">{{ $product->name }}</h3>
                    <p class="text-sm font-semibold text-[#e1e0e2]">{{ $product->price }}</p>
                </div>
                <div wire:click="$dispatch('openModal', { component: 'edit-product', arguments: { product : '{{$product->id}}' }})" class="cursor-pointer flex h-10 w-10 items-center justify-center rounded-full bg-slate-500/25 text-slate-400 transition group-hover:scale-110 group-hover:bg-[#da9858] group-hover:text-white group-active:scale-100 absolute bot-4 right-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hi-mini hi-play h-5 w-5 translate-x-0.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                    </svg>
                </div>
                <div wire:click="$dispatch('openModal', { component: 'delete-product', arguments: { product: '{{$product->id}}' }})" class="cursor-pointer flex h-10 w-10 items-center justify-center rounded-full bg-slate-500/25 text-slate-400 transition group-hover:scale-110 group-hover:bg-[#e81123] group-hover:text-white group-active:scale-100 absolute top-4 right-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hi-mini hi-play h-5 w-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                </div>
            </div>
        </div>
    </a>
</nav>
