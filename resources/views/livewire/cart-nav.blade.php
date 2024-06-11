<div wire:click="navigate" class="h-8 cursor-pointer flex justify-center items-center">
    <div class="relative py-2">
        <div class="t-0 absolute left-3">
            <p class="flex h-2 w-2 items-center justify-center rounded-full bg-red-500 p-3 text-xs text-white">{{Cart::instance($restaurant->id)->content()->count()}}</p>
        </div>
        @svg('fas-cart-shopping', 'fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="file: mt-4 h-6 w-6')
    </div>
</div>
