<div>
    <div class="px-4 sm:px-20 z-10">
        <div class="sm:flex sm:items-center sm:space-x-5 pt-10">
            <div class="flex justify-center sm:justify-start">
                @if ($user->image_path)
                    <img class="h-24 w-24 rounded-full sm:h-32 sm:w-32" src="{{ asset('storage/'.$user->image_path) }}" alt="Profile Picture">
                @else
                    @svg('zondicon-user-solid-circle', 'h-24 w-24 rounded-full sm:h-32 sm:w-32')
                @endif

            </div>
            <div class="mt-6 sm:mt-0 sm:flex sm:items-center sm:space-x-6 sm:pb-1 flex-1">
                <div class="min-w-0 flex-1" style="overflow: visible;">
                    <h1 class="text-5xl font-bold text-black text-center sm:text-left">{{$user->name}}</h1>
                </div>
            </div>
        </div>
    
        <div x-data="{ selectedTab: 'groups', open: false, hover: null }" class="w-full mt-6">
            <!-- Tabs for larger screens -->
            <div class="hidden sm:flex gap-2 overflow-x-auto border-b border-black" role="tablist" aria-label="tab options">
                <button @click="selectedTab = 'groups'" :aria-selected="selectedTab === 'groups'" :tabindex="selectedTab === 'groups' ? '0' : '-1'" :class="selectedTab === 'groups' ? 'font-bold text-[#CD853F] border-b-2 border-[#CD853F] dark:border-[#CD853F] dark:text-[#CD853F]' : 'text-slate-700 font-medium dark:text-slate-300 dark:hover:border-b-slate-300 dark:hover:text-white hover:border-b-2 hover:border-b-slate-800 hover:text-black'" class="px-4 py-2 text-4xl" type="button" role="tab" aria-controls="tabpanelGroups">Profile</button>
                <button @click="selectedTab = 'likes'" :aria-selected="selectedTab === 'likes'" :tabindex="selectedTab === 'likes' ? '0' : '-1'" :class="selectedTab === 'likes' ? 'font-bold text-[#CD853F] border-b-2 border-[#CD853F] dark:border-[#CD853F] dark:text-[#CD853F]' : 'text-slate-700 font-medium dark:text-slate-300 dark:hover:border-b-slate-300 dark:hover:text-white hover:border-b-2 hover:border-b-slate-800 hover:text-black'" class="px-4 py-2 text-4xl" type="button" role="tab" aria-controls="tabpanelLikes">Order History</button>
            </div>
    
            <!-- Select for smaller screens -->
            <div @click="open = !open" @keydown.escape="open = false" @click.away="open = false" class="relative sm:hidden mt-4">
                <div class="block w-full border py-2 pl-1 border-[#CD853F] rounded-md shadow-sm cursor-pointer focus:ring-[#CD853F] focus:border-[#CD853F]">
                    <span x-text="selectedTab === 'groups' ? 'Profile' : 'Order history'" class="block"></span>
                </div>
                <div x-show="open" class="absolute mt-1 w-full rounded-md bg-white shadow-lg z-10">
                    <ul class="py-1 text-base leading-6 shadow-xs max-h-56 rounded-md ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm sm:leading-5">
                        <li @click="selectedTab = 'groups'; open = false" @mouseenter="hover = 'groups'" @mouseleave="hover = null" :class="{ 'bg-[#CD853F] text-black': selectedTab === 'groups' || hover === 'groups' }" class="bg-white hover:bg-[#CD853F] hover:text-white rounded-lg text-gray-900 cursor-pointer select-none relative py-2 pl-3 pr-9">
                            <span class="font-normal block truncate">Profile</span>
                        </li>
                        <li @click="selectedTab = 'likes'; open = false" @mouseenter="hover = 'likes'" @mouseleave="hover = null" :class="{ 'bg-[#CD853F] text-black': selectedTab === 'likes' || hover === 'likes' }" class="bg-white hover:bg-[#CD853F] hover:text-white rounded-lg text-gray-900 cursor-pointer select-none relative py-2 pl-3 pr-9">
                            <span class="font-normal block truncate">Order history</span>
                        </li>
                    </ul>
                </div>
            </div>
    
            <!-- Content for each tab -->
            <div class="my-10">
                <!-- Profile Tab -->
                <div x-show="selectedTab === 'groups'" id="tabpanelGroups" role="tabpanel" aria-label="groups" class="text-slate-700 dark:text-slate-300 flex justify-center bg-[#d9d8d6] rounded-lg relative p-10">
                    <div class="w-full max-w-4xl py-14">
                        <div class="space-y-5 ">
                            <div class="relative p-4">
                                <div class="flex flex-col sm:flex-row pb-4 md:space-x-60 text-2xl md:text-4xl">
                                    <p class="font-bold sm:w-1/3">Name</p>
                                    <p class="mt-1 sm:mt-0 sm:w-2/3 overflow-hidden text-ellipsis whitespace-nowrap">{{$user->name}}</p>
                                </div>
                                <div class="flex">
                                    <span class="border-b border-slate-500 opacity-50 block w-full"></span>
                                </div>
                            </div>
                            <div class="relative p-4">
                                <div class="flex flex-col sm:flex-row pt-10 pb-4 md:space-x-60 text-2xl md:text-4xl">
                                    <p class="font-bold sm:w-1/3">Email</p>
                                    <p class="mt-1 sm:mt-0 sm:w-2/3 overflow-hidden text-ellipsis whitespace-nowrap">{{$user->email}}</p>
                                </div>
                                <div class="flex">
                                    <span class="border-b border-slate-500 opacity-50 block w-full"></span>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="absolute top-0 right-0 m-6" wire:click.stop="$dispatch('openModal', { component: 'edit-user', arguments: { user : '{{$user->id}}' }})">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6 text-black hover:text-[#CD853F] cursor-pointer">
                            <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                            <path d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                        </svg>
                    </div>
    
    
                </div>
            </div>
    
                <!-- Order History Tab -->
                <div x-show="selectedTab === 'likes'" id="tabpanelLikes" role="tabpanel" aria-label="likes" class=" ">
   

                    <div>
                        {{--Order history table--}}
                        <div class="h-[65vh] min-w-full flex justify-center  font-sans ">
                            <div class="  w-full  ">
                                <table class="min-w-full ">
                                    <thead>
                                        <tr class="bg-[#cd853f] text-white uppercase  leading-normal ">
                                            <th class="py-3 px-6"></th>
                                            <th class="py-3 px-6 text-center">Order ID</th>
                                            <th class="py-3 px-6 text-center">Restaurant</th>
                                            <th class="py-3 px-6 text-center">Date</th>
                                            <th class="py-3 px-6 text-center">Total</th>
                                            <th class="py-3 px-6 text-center">Status</th>
                                            <th class="py-3 px-6 text-center">View</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 text-sm font-light">
                                        {{-- Pending --}}
                                        <tr class="border-b border-gray-200 bg-[#ffefd5] hover:bg-[#f1d2b3]">
                                            {{--Number--}}
                                            <td class="py-3 px-3 text-left whitespace-nowrap">
                                                <div class="flex items-center justify-center">
                                                    <span class="font-bold">1</span>
                                                </div>
                                            </td>
                                            {{-- ID --}}
                                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                                <div class="flex items-center justify-center">
                                                    <span class="font-bold">#12345</span>
                                                </div>
                                            </td>
                                            {{-- Customer --}}
                                            <td class="py-3 px-4 text-left whitespace-nowrap">
                                                <div class="flex items-center justify-center">
                                                    <span class="font-bold">Nguyễn Thị Ánh Tuyết</span>
                                                </div>
                                            </td>
                                            {{-- Date --}}
                                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                                <div class="flex items-center justify-center">
                                                    <span class="font-bold">08/06/2024</span>
                                                </div>
                                            </td>
                                            {{-- Total --}}
                                            <td class="py-3 px-6 text-left">
                                                <div class="flex items-center justify-center">
                                                    <span class="font-bold">5.000.000</span>
                                                </div>
                                            </td>
                                            
                                            {{-- Status --}}
                                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                                <div class="flex items-center justify-center shadow-md rounded-lg bg-blue-200 shadow-blue-300">
                                                    <span class="
                                                     py-1 px-3 rounded-full font-bold text-sm text-blue-500">Pending</span>
                                                </div>
                                            </td>
                                            {{-- Action --}}
                                            <td class="py-3 px-4 justify-center text-center">
                                                <div class="flex  item-center justify-center cursor-pointer w-full ml-2 transform  text-gray-500 hover:scale-110">
                                                        {{-- Reject --}}
                                                            @svg('zondicon-view-show', 'w-full h-5 hover:bg-gray-300 rounded-lg z-10')
                                                </div>
                                            </td>
                                        </tr>
                                        
                                        
                                        {{-- Completed --}}
                                        <tr class="border-b  border-gray-200 bg-[#e4c085] hover:bg-[#f1d2b3]">
                                            {{--Number--}}
                                            <td class="py-3 px-3 text-left whitespace-nowrap">
                                                <div class="flex items-center justify-center">
                                                    <span class="font-bold">1</span>
                                                </div>
                                            </td>
                                            {{-- ID --}}
                                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                                <div class="flex items-center justify-center">
                                                    <span class="font-bold">#12345</span>
                                                </div>
                                            </td>
                                            {{-- Customer --}}
                                            <td class="py-3 px-4 text-left whitespace-nowrap">
                                                <div class="flex items-center justify-center">
                                                    <span class="font-bold">Nguyễn Thị Ánh Tuyết</span>
                                                </div>
                                            </td>
                                            {{-- Date --}}
                                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                                <div class="flex items-center justify-center">
                                                    <span class="font-bold">08/06/2024</span>
                                                </div>
                                            </td>
                                            {{-- Total --}}
                                            <td class="py-3 px-6 text-left">
                                                <div class="flex items-center justify-center">
                                                    <span class="font-bold">5.000.000</span>
                                                </div>
                                            </td>
                                            
                                            {{-- Status --}}
                                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                                <div class="flex items-center justify-center shadow-md rounded-lg bg-green-200 shadow-green-300">
                                                    <span class=" py-1 px-3 rounded-full font-bold text-sm text-green-600">Completed</span>
                                                </div>
                                            </td>
                                            {{-- Action --}}
                                            <td class="py-3 px-4 justify-center text-center">
                                                <div class="flex  item-center justify-center cursor-pointer w-full ml-2 transform  text-gray-500 hover:scale-110">
                                                        {{-- Reject --}}
                                                            @svg('zondicon-view-show', 'w-full h-5 hover:bg-gray-300 rounded-lg')
                                                </div>
                                            </td>
                                        </tr>
                                        {{-- Fail --}}
                                        <tr class="border-b border-gray-200 bg-[#ffefd5] hover:bg-[#f1d2b3]">
                                            {{--Number--}}
                                            <td class="py-3 px-3 text-left whitespace-nowrap">
                                                <div class="flex items-center justify-center">
                                                    <span class="font-bold">1</span>
                                                </div>
                                            </td>
                                            {{-- ID --}}
                                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                                <div class="flex items-center justify-center">
                                                    <span class="font-bold">#12345</span>
                                                </div>
                                            </td>
                                            {{-- Customer --}}
                                            <td class="py-3 px-4 text-left whitespace-nowrap">
                                                <div class="flex items-center justify-center">
                                                    <span class="font-bold">Nguyễn Thị Ánh Tuyết</span>
                                                </div>
                                            </td>
                                            {{-- Date --}}
                                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                                <div class="flex items-center justify-center">
                                                    <span class="font-bold">08/06/2024</span>
                                                </div>
                                            </td>
                                            {{-- Total --}}
                                            <td class="py-3 px-6 text-left">
                                                <div class="flex items-center justify-center">
                                                    <span class="font-bold">5.000.000</span>
                                                </div>
                                            </td>
                                            {{-- Status --}}
                                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                                <div class="flex items-center justify-center shadow-md rounded-lg bg-red-200 shadow-red-300">
                                                    <span class=" py-1 px-3 rounded-full font-bold text-sm text-red-500">Fail</span>
                                                </div>
                                            </td>
                                            {{-- Action --}}
                                            <td class="py-3 px-4 justify-center text-center">
                                                <div class="flex  item-center justify-center cursor-pointer w-full ml-2 transform  text-gray-500 hover:scale-110">
                                                        {{-- Reject --}}
                                                            @svg('zondicon-view-show', 'w-full h-5 hover:bg-gray-300 rounded-lg')
                                                </div>
                                            </td>
                                        </tr>
                                        {{-- Delivered--}}
                                        <tr class="border-b border-gray-200  bg-[#e4c085] hover:bg-[#f1d2b3]">
                                            {{--Number--}}
                                            <td class="py-3 px-3 text-left whitespace-nowrap">
                                                <div class="flex items-center justify-center">
                                                    <span class="font-bold">1</span>
                                                </div>
                                            </td>
                                            {{-- ID --}}
                                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                                <div class="flex items-center justify-center">
                                                    <span class="font-bold">#12345</span>
                                                </div>
                                            </td>
                                            {{-- Customer --}}
                                            <td class="py-3 px-4 text-left whitespace-nowrap">
                                                <div class="flex items-center justify-center">
                                                    <span class="font-bold">Nguyễn Thị Ánh Tuyết</span>
                                                </div>
                                            </td>
                                            {{-- Date --}}
                                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                                <div class="flex items-center justify-center">
                                                    <span class="font-bold">08/06/2024</span>
                                                </div>
                                            </td>
                                            {{-- Total --}}
                                            <td class="py-3 px-6 text-left">
                                                <div class="flex items-center justify-center">
                                                    <span class="font-bold">5.000.000</span>
                                                </div>
                                            </td>
                                            {{-- Status --}}
                                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                                    <div class="flex items-center justify-center shadow-md rounded-lg bg-yellow-200 shadow-yellow-400">
                                                        <span class=" py-1 px-3 rounded-full font-bold text-sm text-yellow-600">Delivered</span>
                                                    </div>
                                            </td>
                                            {{-- Action --}}
                                            <td class="py-3 px-4 justify-center text-center">
                                                <div class="flex  item-center justify-center cursor-pointer w-full ml-2 transform  text-gray-500 hover:scale-110">
                                                        {{-- Reject --}}
                                                            @svg('zondicon-view-show', 'w-full h-5 hover:bg-gray-300 rounded-lg')
                                                </div>
                                            </td>
                                        </tr>
                                        {{-- Delivered--}}
                                        {{-- Pending --}}
                                        <tr class="border-b border-gray-200 bg-[#ffefd5] hover:bg-[#f1d2b3]">
                                            {{--Number--}}
                                            <td class="py-3 px-3 text-left whitespace-nowrap">
                                                <div class="flex items-center justify-center">
                                                    <span class="font-bold">1</span>
                                                </div>
                                            </td>
                                            {{-- ID --}}
                                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                                <div class="flex items-center justify-center">
                                                    <span class="font-bold">#12345</span>
                                                </div>
                                            </td>
                                            {{-- Customer --}}
                                            <td class="py-3 px-4 text-left whitespace-nowrap">
                                                <div class="flex items-center justify-center">
                                                    <span class="font-bold">Nguyễn Thị Ánh Tuyết</span>
                                                </div>
                                            </td>
                                            {{-- Date --}}
                                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                                <div class="flex items-center justify-center">
                                                    <span class="font-bold">08/06/2024</span>
                                                </div>
                                            </td>
                                            {{-- Total --}}
                                            <td class="py-3 px-6 text-left">
                                                <div class="flex items-center justify-center">
                                                    <span class="font-bold">5.000.000</span>
                                                </div>
                                            </td>
                                            
                                            {{-- Status --}}
                                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                                <div class="flex items-center justify-center shadow-md rounded-lg bg-blue-200 shadow-blue-300">
                                                    <span class="
                                                     py-1 px-3 rounded-full font-bold text-sm text-blue-500">Pending</span>
                                                </div>
                                            </td>
                                            {{-- Action --}}
                                            {{-- Action --}}
                                            <td class="py-3 px-4 justify-center text-center">
                                                <div class="flex  item-center justify-center cursor-pointer w-full ml-2 transform  text-gray-500 hover:scale-110">
                                                        {{-- Reject --}}
                                                            @svg('zondicon-view-show', 'w-full h-5 hover:bg-gray-300 rounded-lg')
                                                </div>
                                            </td>
                                        </tr>
                                        {{-- Delivered--}}
                                        <tr class="border-b border-gray-200  bg-[#e4c085] hover:bg-[#f1d2b3]">
                                            {{--Number--}}
                                            <td class="py-3 px-3 text-left whitespace-nowrap">
                                                <div class="flex items-center justify-center">
                                                    <span class="font-bold">1</span>
                                                </div>
                                            </td>
                                            {{-- ID --}}
                                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                                <div class="flex items-center justify-center">
                                                    <span class="font-bold">#12345</span>
                                                </div>
                                            </td>
                                            {{-- Customer --}}
                                            <td class="py-3 px-4 text-left whitespace-nowrap">
                                                <div class="flex items-center justify-center">
                                                    <span class="font-bold">Nguyễn Thị Ánh Tuyết</span>
                                                </div>
                                            </td>
                                            {{-- Date --}}
                                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                                <div class="flex items-center justify-center">
                                                    <span class="font-bold">08/06/2024</span>
                                                </div>
                                            </td>
                                            {{-- Total --}}
                                            <td class="py-3 px-6 text-left">
                                                <div class="flex items-center justify-center">
                                                    <span class="font-bold">5.000.000</span>
                                                </div>
                                            </td>
                                            {{-- Status --}}
                                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                                    <div class="flex items-center justify-center shadow-md rounded-lg bg-yellow-200 shadow-yellow-400">
                                                        <span class=" py-1 px-3 rounded-full font-bold text-sm text-yellow-600">Delivered</span>
                                                    </div>
                                            </td>
                                            {{-- Action --}}
                                            <td class="py-3 px-4 justify-center text-center">
                                                <div class="flex  item-center justify-center cursor-pointer w-full ml-2 transform  text-gray-500 hover:scale-110">
                                                        {{-- Reject --}}
                                                            @svg('zondicon-view-show', 'w-full h-5 hover:bg-gray-300 rounded-lg')
                                                </div>
                                            </td>
                                        </tr>
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>