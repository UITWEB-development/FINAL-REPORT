<div wire:poll.1.5s>
    <h2 class="mb-2 text-3xl font-semibold">Orders</h2>
    <h3 class="mb-3 text-sm font-medium text-slate-500">
        Welcome {{ auth()->user()->name }}, everything looks great!
    </h3>
    <div class="h-[70vh] min-w-full flex justify-center pt-5 font-sans">
        <div class="overflow-auto w-full">
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-[#cd853f] text-white uppercase  leading-normal ">
                        <th class="py-3 px-6 text-center">Order ID</th>
                        <th class="py-3 px-6 text-center">Customer</th>
                        <th class="py-3 px-6 text-center">Date</th>
                        <th class="py-3 px-6 text-center">Total</th>
                        <th class="py-3 px-6 text-center">Payment method</th>
                        <th class="py-3 px-6 text-center">Status</th>
                        <th class="py-3 px-6 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach ($orders as $order)
                        <tr class="border-b border-gray-200 hover:bg-[#f1d2b3] {{$loop->index % 2 == 0 ? 'bg-[#ffefd5]' : 'bg-[#e4c085]'}}">

                            {{-- ID --}}
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <div class="flex items-center justify-center">
                                    <span class="font-bold">#{{$order->code}}</span>
                                </div>
                            </td>
                            {{-- Customer --}}
                            <td class="py-3 px-4 text-left whitespace-nowrap">
                                <div class="flex items-center justify-center">
                                    <span class="font-bold">{{$order->user->name}}</span>
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
                            {{-- Method --}}
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                    <span class="font-bold">{{Str::upper($order->payment_method)}}</span>
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
