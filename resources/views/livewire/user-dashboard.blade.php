<div>
    <div class="px-4 sm:px-20 z-10">
        <div class="sm:flex sm:items-center sm:space-x-5 pt-10">
            <div class="flex justify-center sm:justify-start">
                @if ($user->image_path)
                    <img class="h-24 w-24 rounded-full sm:h-32 sm:w-32" src="{{ asset('storage/' . $user->image_path) }}"
                        alt="Profile Picture">
                @else
                    @svg('zondicon-user-solid-circle', 'h-24 w-24 rounded-full sm:h-32 sm:w-32')
                @endif

            </div>
            <div class="mt-6 sm:mt-0 sm:flex sm:items-center sm:space-x-6 sm:pb-1 flex-1">
                <div class="min-w-0 flex-1" style="overflow: visible;">
                    <h1 class="text-5xl font-bold text-black text-center sm:text-left">{{ $user->name }}</h1>
                </div>
            </div>
        </div>

        <div x-data="{ selectedTab: 'groups', open: false, hover: null }" class="w-full mt-6">
            <!-- Tabs for larger screens -->
            <div class="hidden sm:flex gap-2 overflow-x-auto border-b border-black" role="tablist"
                aria-label="tab options">
                <button @click="selectedTab = 'groups'" :aria-selected="selectedTab === 'groups'"
                    :tabindex="selectedTab === 'groups' ? '0' : '-1'"
                    :class="selectedTab === 'groups' ?
                        'font-bold text-[#CD853F] border-b-2 border-[#CD853F] dark:border-[#CD853F] dark:text-[#CD853F]' :
                        'text-slate-700 font-medium dark:text-slate-300 dark:hover:border-b-slate-300 dark:hover:text-white hover:border-b-2 hover:border-b-slate-800 hover:text-black'"
                    class="px-4 py-2 text-4xl" type="button" role="tab"
                    aria-controls="tabpanelGroups">Profile</button>
                <button @click="selectedTab = 'likes'" :aria-selected="selectedTab === 'likes'"
                    :tabindex="selectedTab === 'likes' ? '0' : '-1'"
                    :class="selectedTab === 'likes' ?
                        'font-bold text-[#CD853F] border-b-2 border-[#CD853F] dark:border-[#CD853F] dark:text-[#CD853F]' :
                        'text-slate-700 font-medium dark:text-slate-300 dark:hover:border-b-slate-300 dark:hover:text-white hover:border-b-2 hover:border-b-slate-800 hover:text-black'"
                    class="px-4 py-2 text-4xl" type="button" role="tab" aria-controls="tabpanelLikes">Order
                    History</button>
            </div>

            <!-- Select for smaller screens -->
            <div @click="open = !open" @keydown.escape="open = false" @click.away="open = false"
                class="relative sm:hidden mt-4">
                <div
                    class="block w-full border py-2 pl-1 border-[#CD853F] rounded-md shadow-sm cursor-pointer focus:ring-[#CD853F] focus:border-[#CD853F]">
                    <span x-text="selectedTab === 'groups' ? 'Profile' : 'Order history'" class="block"></span>
                </div>
                <div x-show="open" class="absolute mt-1 w-full rounded-md bg-white shadow-lg z-10">
                    <ul
                        class="py-1 text-base leading-6 shadow-xs max-h-56 rounded-md ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm sm:leading-5">
                        <li @click="selectedTab = 'groups'; open = false" @mouseenter="hover = 'groups'"
                            @mouseleave="hover = null"
                            :class="{ 'bg-[#CD853F] text-black': selectedTab === 'groups' || hover === 'groups' }"
                            class="bg-white hover:bg-[#CD853F] hover:text-white rounded-lg text-gray-900 cursor-pointer select-none relative py-2 pl-3 pr-9">
                            <span class="font-normal block truncate">Profile</span>
                        </li>
                        <li @click="selectedTab = 'likes'; open = false" @mouseenter="hover = 'likes'"
                            @mouseleave="hover = null"
                            :class="{ 'bg-[#CD853F] text-black': selectedTab === 'likes' || hover === 'likes' }"
                            class="bg-white hover:bg-[#CD853F] hover:text-white rounded-lg text-gray-900 cursor-pointer select-none relative py-2 pl-3 pr-9">
                            <span class="font-normal block truncate">Order history</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Content for each tab -->
            <div class="my-10">
                <!-- Profile Tab -->
                <div x-show="selectedTab === 'groups'" id="tabpanelGroups" role="tabpanel" aria-label="groups"
                    class="text-slate-700 dark:text-slate-300 flex justify-center bg-[#d9d8d6] rounded-lg relative p-10">
                    <div class="w-full max-w-4xl py-14">
                        <div class="space-y-5 ">
                            <div class="relative p-4">
                                <div class="flex flex-col sm:flex-row pb-4 md:space-x-60 text-2xl md:text-4xl">
                                    <p class="font-bold sm:w-1/3">Name</p>
                                    <p class="mt-1 sm:mt-0 sm:w-2/3 overflow-hidden text-ellipsis whitespace-nowrap">
                                        {{ $user->name }}</p>
                                </div>
                                <div class="flex">
                                    <span class="border-b border-slate-500 opacity-50 block w-full"></span>
                                </div>
                            </div>
                            <div class="relative p-4">
                                <div class="flex flex-col sm:flex-row pt-10 pb-4 md:space-x-60 text-2xl md:text-4xl">
                                    <p class="font-bold sm:w-1/3">Email</p>
                                    <p class="mt-1 sm:mt-0 sm:w-2/3 overflow-hidden text-ellipsis whitespace-nowrap">
                                        {{ $user->email }}</p>
                                </div>
                                <div class="flex">
                                    <span class="border-b border-slate-500 opacity-50 block w-full"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="absolute top-0 right-0 m-6"
                        wire:click.stop="$dispatch('openModal', { component: 'edit-user', arguments: { user : '{{ $user->id }}' }})">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="h-6 w-6 text-black hover:text-[#CD853F] cursor-pointer">
                            <path
                                d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                            <path
                                d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                        </svg>
                    </div>


                </div>
            </div>

            <!-- Order History Tab -->
            <div wire:poll.3s x-show="selectedTab === 'likes'" id="tabpanelLikes" role="tabpanel" aria-label="likes" class="mb-8">
                <div>
                    {{-- Order history table --}}
                    <div class="h-[60vh] min-w-full flex justify-center font-sans overflow-auto">
                        <div class="w-full">
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
                                    @foreach ($orders as $order)
                                        <tr class="border-b border-gray-200 hover:bg-[#f1d2b3] {{$loop->index % 2 == 0 ? 'bg-[#ffefd5]' : 'bg-[#e4c085]'}}">
                                            {{-- Number --}}
                                            <td class="py-3 px-3 text-left whitespace-nowrap">
                                                <div class="flex items-center justify-center">
                                                    <span class="font-bold">{{$loop->index+1}}</span>
                                                </div>
                                            </td>
                                            {{-- ID --}}
                                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                                <div class="flex items-center justify-center">
                                                    <span class="font-bold">#{{$order->code}}</span>
                                                </div>
                                            </td>
                                            {{-- Customer --}}
                                            <td class="py-3 px-4 text-left whitespace-nowrap">
                                                <div class="flex items-center justify-center">
                                                    <span class="font-bold">{{$order->restaurant->restaurant_description->restaurant_name}}</span>
                                                </div>
                                            </td>
                                            {{-- Date --}}
                                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                                <div class="flex items-center justify-center">
                                                    <span class="font-bold">{{ \Carbon\Carbon::parse($order->order_date)->format('d/m/Y')}}</span>
                                                </div>
                                            </td>
                                            {{-- Total --}}
                                            <td class="py-3 px-6 text-left">
                                                <div class="flex items-center justify-center">
                                                    <span class="font-bold">{{ number_format($order->total, 0, ',', '.') }} VND</span>
                                                </div>
                                            </td>
                                            {{-- Status --}}
                                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                                <div
                                                    class="{{$styles[$order->status]['div']}}">
                                                    <span
                                                        class="{{$styles[$order->status]['span']}}">{{$order->status}}</span>
                                                </div>
                                            </td>
                                            {{-- Action --}}
                                            <td x-data="{ isOpen: false, openedWithKeyboard: false }" @keydown.esc.prevent="isOpen = false, openedWithKeyboard = false" class="relative flex items-center justify-center py-3">
                                                <!-- Toggle Button -->
                                                <button type="button" aria-label="context menu" @click="isOpen = ! isOpen" @keydown.space.prevent="openedWithKeyboard = true" @keydown.enter.prevent="openedWithKeyboard = true" @keydown.down.prevent="openedWithKeyboard = true" class="inline-flex cursor-pointer items-center bg-transparent transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-slate-800 active:opacity-100 dark:focus-visible:outline-slate-300" :class="isOpen || openedWithKeyboard ? 'text-black dark:text-white' : 'text-slate-700 dark:text-slate-300'" :aria-expanded="isOpen || openedWithKeyboard" aria-haspopup="true">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" fill="currentColor"  class="w-8 h-8">
                                                        <path fill-rule="evenodd" d="M4.5 12a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zm6 0a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zm6 0a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" clip-rule="evenodd"/>
                                                    </svg>
                                                </button>
                                                <!-- Dropdown Menu -->
                                                <div x-cloak x-show="isOpen || openedWithKeyboard" x-transition x-trap="openedWithKeyboard" @click.outside="isOpen = false, openedWithKeyboard = false" @keydown.down.prevent="$focus.wrap().next()" @keydown.up.prevent="$focus.wrap().previous()" class="absolute z-10 top-8 flex w-3/4 flex-col divide-y divide-slate-300 overflow-hidden rounded-xl border border-slate-300 bg-slate-100 dark:divide-slate-700 dark:border-slate-700 dark:bg-slate-800" role="menu">
                                                    <!-- Dropdown Section -->
                                                    <ul class="flex flex-col py-1.5" role="none"> 
                                                        @foreach ($actions[$order->status] as $key => $value)
                                                            <li @click="isOpen = false; {{'$wire.'.$value."('$order->id')"}} " class="flex font-bold cursor-pointer items-center gap-2 bg-slate-100 px-4 py-2 text-sm text-slate-700 hover:bg-slate-800/5 hover:text-black focus-visible:bg-slate-800/10 focus-visible:text-black focus-visible:outline-none dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-slate-100/5 dark:hover:text-white dark:focus-visible:bg-slate-100/10 dark:focus-visible:text-white" role="menuitem" tabindex="0">
                                                                {{$key}}
                                                            </li>
                                                        @endforeach
                                                     </ul>
                                                 </div>
                                            </td> 
                                        </tr>
                                    @endforeach
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
