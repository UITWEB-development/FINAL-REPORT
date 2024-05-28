<div>
    
    
    <div class="w-full h-[85.8vh] bg-[#FFEFD5] px-7 py-14 overflow-y-auto">
            <div class="w-full bg-[#FFEFD5] flex flex-col">
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h3 class="text-3xl font-semibold text-gray-900 dark:text-white">
                        Add Product
                    </h3>
                    <button wire:click="$dispatch('closeModal')" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
            </div>
        
        <form action="#">
            <div class="gap-4 mb-4">
                <div>
                    <label for="name" class="block mb-2 text-lg  text-gray-900 dark:text-white font-semibold">Product Name</label>
                    <input type="text" name="name" id="name" class="mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                </div>
                <div>
                    <label for="price" class="block mb-2 text-lg font-semibold text-gray-900 dark:text-white">Price</label>
                    <input type="number" name="price" id="price" class="mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Price" required="">
                </div>
                <div>
                    <label for="category" class="block mb-2 text-lg font-semibold text-gray-900 dark:text-white">Category</label>
                    <select id="category" class="mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected="">Select category</option>
                        <option value="TV">TV/Monitors</option>
                        <option value="PC">PC</option>
                        <option value="GA">Gaming/Console</option>
                        <option value="PH">Phones</option>
                    </select>
                </div>
                <div class="sm:col-span-2 mb-4">
                    <label for="description" class="block mb-2 text-lg font-semibold text-gray-900 dark:text-white">Description</label>
                    <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Write product description here"></textarea>
                </div>
    
                <div class="max-w-2xl mx-auto">
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Product Image</h2>
                    <div class="flex flex-col items-center justify-center w-full">
                        
                        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-56 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                            </div>
                            <input id="dropzone-file" type="file" class="hidden" />
                        </label>
                    </div>
                    <div id="image-preview" class="mt-4 flex items-center justify-center">
                        <!-- Image preview will be inserted here -->
                    </div>
                </div>
            </div>
            <div x-data="{ switchOn: false }" class="flex items-center justify-center space-x-2">
                <input id="thisId" type="checkbox" name="switch" class="hidden" :checked="switchOn">
            
                <button 
                    x-ref="switchButton"
                    type="button" 
                    @click="switchOn = ! switchOn"
                    :class="switchOn ? 'bg-green-500' : 'bg-neutral-200'" 
                    class="relative inline-flex h-6 py-0.5 ml-4 focus:outline-none rounded-full w-10"
                    x-cloak>
                    <span :class="switchOn ? 'translate-x-[18px]' : 'translate-x-0.5'" class="w-5 h-5 duration-200 ease-in-out bg-white rounded-full shadow-md"></span>
                </button>
            
                <label @click="$refs.switchButton.click(); $refs.switchButton.focus()" :id="$id('switch')" 
                    :class="{ 'text-green-500': switchOn, 'text-gray-400': ! switchOn }"
                    class="text-sm select-none font-semibold"
                    x-cloak>
                    Available
                </label>
            </div>
            <div class="text-center pt-12">
                <button class="bg-[#cd853f] hover:bg-[#7e5832] text-white font-bold py-1 px-4 w-full h-12">Add Product</button>
            </div>
        </form> 
    </div>
    
    
    
</div>