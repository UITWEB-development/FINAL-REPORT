<nav class="grid gap-4 lg:gap-8 mt-4" >
    <a class=" group aspect-h-10 aspect-w-16 relative overflow-hidden rounded-2xl bg-black/25 transition hover:ring-4 hover:ring-[#cd853f] active:opacity-75">
        <img class="object-cover" src="{{ asset('storage/'.$product->image_path) }}"/>
        <div class="cursor-pointer absolute inset-0 flex  justify-between bg-gradient-to-b from-transparent via-black/60 to-black">
            <div class="flex items-end justify-between gap-2 px-4 py-5">
                {{-- Out of stock
                <div class="cursor-pointer flex h-10 w-10 items-center justify-center rounded-full bg-slate-500/25 text-slate-400 transition group-hover:scale-110 group-hover:bg-[#7e7d7d] group-hover:text-white group-active:scale-100 absolute top-4 left-4">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="hi-mini hi-play h-5 w-5">
                        <path d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375Z" />
                        <path fill-rule="evenodd" d="m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087Zm6.133 2.845a.75.75 0 0 1 1.06 0l1.72 1.72 1.72-1.72a.75.75 0 1 1 1.06 1.06l-1.72 1.72 1.72 1.72a.75.75 0 1 1-1.06 1.06L12 15.685l-1.72 1.72a.75.75 0 1 1-1.06-1.06l1.72-1.72-1.72-1.72a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                      </svg>
                </div>
                Out of stock --}}
                {{-- In stock --}}
                <div class="cursor-pointer flex h-10 w-10 items-center justify-center rounded-full bg-slate-500/25 text-slate-400 transition group-hover:scale-110 group-hover:bg-[#64c859] group-hover:text-white group-active:scale-100 absolute top-4 left-4">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="hi-mini hi-play h-5 w-5">
                        <path d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375Z" />
                        <path fill-rule="evenodd" d="m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087ZM12 10.5a.75.75 0 0 1 .75.75v4.94l1.72-1.72a.75.75 0 1 1 1.06 1.06l-3 3a.75.75 0 0 1-1.06 0l-3-3a.75.75 0 1 1 1.06-1.06l1.72 1.72v-4.94a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                      </svg>
                </div>
                {{-- In stock --}}
                <div class="space-y-1">
                    <h3 class="text-lg font-semibold text-white ">{{ $product->name }}</h3>
                    <p class="text-sm font-semibold text-[#e1e0e2]">{{ $product->price }}</p>
                </div>
                <div wire:click="$dispatch('openModal', { component: 'edit-product', arguments: { product : '{{$product->id}}' }})" class="cursor-pointer flex h-10 w-10 items-center justify-center rounded-full bg-slate-500/25 text-slate-400 transition group-hover:scale-110 group-hover:bg-[#da9858] group-hover:text-white group-active:scale-100 absolute bot-4 right-4">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="hi-mini hi-play h-5 w-5">
                        <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                        <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                      </svg>
                      
                </div>
                <div wire:click="$dispatch('openModal', { component: 'delete-product', arguments: { product: '{{$product->id}}' }})" class="cursor-pointer flex h-10 w-10 items-center justify-center rounded-full bg-slate-500/25 text-slate-400 transition group-hover:scale-110 group-hover:bg-[#e81123] group-hover:text-white group-active:scale-100 absolute top-4 right-4">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="hi-mini hi-play h-5 w-5q">
                        <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                      </svg>
                      
                </div>
            </div>
        </div>
    </a>
</nav>
