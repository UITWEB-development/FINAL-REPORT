<div>
    <div class="w-full h-full p-8">
        <div class="w-full flex flex-col">
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-3xl font-semibold text-gray-900 dark:text-white">
                    Update Information
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
        <div class="max-w-2xl mx-auto mb-2">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Restaurant Image</h2>
            <div class="flex flex-col items-center justify-center w-full relative">
                <label for="dropzone-file"
                    class="flex flex-col items-center justify-center w-full h-56 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    
               

                    <div wire:loading wire:target="image" role="status" class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                        <svg aria-hidden="true" class="inline w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-green-500" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                        </svg>
                        <span class="sr-only">Loading...</span>
                    </div>


                    <input wire:model="image" id="dropzone-file" type="file" accept="image/*" class="hidden" />
                </label>
            </div>

        </div>
        <div>
            <label for="name"
                class="block mb-2 text-lg  text-gray-900 dark:text-white font-semibold">Restaurant Name</label>
            <input type="text" name="name" id="name"
                class="mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Your Restaurant Name" required="">
        </div>
        <div>
            <label for="phone"
                class="block mb-2 text-lg font-semibold text-gray-900 dark:text-white">Phone Number</label>
                <input type="number" name="phone" id="phone"
                class="mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Phone Number" required="">
         
        </div>
        <div class="mb-5  flex md:flex-row md:items-center md:flex-nowrap flex-col">
            <label for="opentime" class="w-full md:w-32 font-bold mb-2 md:mb-0">Open time</label>
            <input type="time" name="opentime" id="opentime" class="h-9 flex-1 rounded-lg mb-2 md:mb-0 md:mr-7 md:ml-0" required="">
            <label for="closetime" class="w-full md:w-32 font-bold mb-2 md:mb-0">Close time</label>
            <input type="time" name="closetime" id="closetime" class="h-9 flex-1 rounded-lg" required="">
        </div>
        
        
        <div > 
        <div class="pb-6"><livewire:google-map></livewire:google-map></div>
        </div>
        
        
        
        
            
            <div class="text-center">
              <button class="bg-[#cd853f] hover:bg-[#7e5832] text-white font-bold py-1 px-4 w-full h-12 flex justify-center items-center text-lg">Save</button>
          </div> 
        </div>
    </div>
</div>
