<div>
    <livewire:toast></livewire:toast>

    @if (session()->has('success'))
        <script>
            window.onload = function() {
                window.toast('{{ session()->get('success') }}', {
                    type: "success",
                    position: "top-right"
                })
            }
        </script>
    @endif
    <div class="flex items-center justify-between">
        <div>
            <div class="hidden md:block">
                <h2 class="mb-2 text-3xl font-semibold">Products</h2>
                <h3 class="mb-8 text-sm font-medium text-slate-500">
                    Welcome {{ auth()->user()->name }}, everything looks great!
                </h3>
            </div>
            <div class=" block md:hidden">
                @svg('fab-product-hunt', 'size-12')
            </div>
        </div>
          <livewire:search-product></livewire:search-product>
        <div>

        </div>
        <div>
            <form action="">
                <button wire:click="$dispatch('openModal', { component: 'add-product' })" type="button"
                    class="cursor-pointer inline-flex justify-center items-center gap-2 whitespace-nowrap bg-[#cd853f] md:px-4 md:py-2 text-lg font-medium tracking-wide text-white transition hover:opacity-75 text-center focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#cd853f] active:opacity-100 active:outline-offset-0 disabled:opacity-75 disabled:cursor-not-allowed dark:bg-[#cd853f dark:text-white dark:focus-visible:outline-[#cd853f] rounded-full md:rounded-xl aspect-1 md:aspect-8 size-12 md:size-auto">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        class="size-6 fill-white dark:fill-white" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z"
                            clip-rule="evenodd" />
                    </svg>

                    <span class="hidden md:block">Create</span>
                </button>

            </form>
        </div>
    </div>
    <div class=" xl:max-w-7xl">
        <div id="categories" class="flex items-center justify-between">
          <livewire:select-category></livewire:select-category>
        </div>
    </div>
    <div class="relative">
        <livewire:product-list></livewire:product-list>
    </div>

</div>
