<div class="w-full h-[85.8vh]  px-7 py-7 overflow-y-auto">
    <div class="w-full flex flex-col">
        <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
            <h3 class="text-2xl font-semibold text-black dark:text-white">
                Location & Contact Information
            </h3>
            <button tabindex="-1" wire:click="$dispatch('closeModal')"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
        </div>
    </div>
    <img src="{{ asset('storage/' . $restaurant->image_path) }}" alt="speaker image" class="w-full h-[400px] rounded-lg">
    <div class="rounded-3xl p-4 lg:p-3 mb-3 max-lg:w-full max-lg:mx-auto gap-y-2">
        {{-- <img src="{{ asset('storage/' . $restaurant->image_path) }}" alt="speaker image" class="w-full h-[60%]"> --}}
        <h1 class="text-center mt-2 font-bold  whitespace-nowrap text-[5cqmin]">
            {{ $restaurant->restaurant_description->restaurant_name }}</h1>
        <div class="flex flex-row justify-center">
            <!-- Your SVG icons here -->
        </div>
        <div
            class="w-full  lg:items-center gap-10 mb-1 mx-2 2xl:mt-0 xl:mt-2 lg:mt-1 mt-3 ">
            <div class="  justify-between items-center w-full">
                <div class="flex flex-row gap-3 items-center">
                    <!-- Phone icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                        <path fill-rule="evenodd" d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z" clip-rule="evenodd" />
                      </svg>
                      
                    <span class="text-[3cqmin] "> {{ $restaurant->restaurant_description->phone_number }}</span>
                </div>
                <div class=" flex gap-3 items-center ml-auto">
                    <!-- Clock icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 0 0 0-1.5h-3.75V6Z" clip-rule="evenodd" />
                      </svg>
                      
                    <span class="text-[3cqmin]   "> {{ $restaurant->restaurant_description->opening_time }} -
                        {{ $restaurant->restaurant_description->closing_time }}</span>
                </div>
            </div>
            <div class=" flex  lg:flex-row lg:justify-between mt-2 lg:mt-0">
                <div class="flex flex-row gap-3 ">
                    <!-- Location icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                        <path fill-rule="evenodd" d="M8.161 2.58a1.875 1.875 0 0 1 1.678 0l4.993 2.498c.106.052.23.052.336 0l3.869-1.935A1.875 1.875 0 0 1 21.75 4.82v12.485c0 .71-.401 1.36-1.037 1.677l-4.875 2.437a1.875 1.875 0 0 1-1.676 0l-4.994-2.497a.375.375 0 0 0-.336 0l-3.868 1.935A1.875 1.875 0 0 1 2.25 19.18V6.695c0-.71.401-1.36 1.036-1.677l4.875-2.437ZM9 6a.75.75 0 0 1 .75.75V15a.75.75 0 0 1-1.5 0V6.75A.75.75 0 0 1 9 6Zm6.75 3a.75.75 0 0 0-1.5 0v8.25a.75.75 0 0 0 1.5 0V9Z" clip-rule="evenodd" />
                      </svg>
                      
                      
                    <span class="text-[3cqmin]"> {{ $restaurant->restaurant_description->address }}</span>
                </div>
            </div>
        </div>
    </div>
    <livewire:alpine-google-map-show :lat="$restaurant->restaurant_description->latitude" :lng="$restaurant->restaurant_description->longitude" :name="$restaurant->restaurant_description->restaurant_name" :address="$restaurant->restaurant_description->address"></livewire:alpine-google-map-show>
</div>
