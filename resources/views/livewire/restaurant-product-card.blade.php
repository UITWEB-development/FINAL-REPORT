<a
    class="group aspect-h-10 aspect-w-16 relative overflow-hidden rounded-2xl bg-black/25 transition hover:ring-4 hover:ring-[#cd853f] active:opacity-75">
    <img class="object-cover"
        src="{{ asset('storage/'.$product->image_path) }}" />
    <div class="cursor-pointer absolute inset-0 flex justify-between bg-gradient-to-b from-transparent to-black">
        <div
            class="space-y-1 transition group-hover:scale-105 text-white group-hover:text-yellow-600 group-active:scale-100 absolute bottom-3 left-3">
            <h3 class="text-2xl font-semibold">{{ $product->name }}</h3>
            <p class="text-sm font-semibold text-[#e1e0e2]">{{ number_format($product->price, 0, ',', '.') }} VND</p>
        </div>
    </div>
</a>
