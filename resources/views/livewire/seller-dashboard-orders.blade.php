<div>
    <h2 class="mb-2 text-3xl font-semibold">Orders</h2>
    <h3 class="mb-3 text-sm font-medium text-slate-500">
        Welcome {{auth()->user()->name}}, everything looks great!
    </h3>
    <div class="h-[65vh] min-w-full flex justify-center pt-16 font-sans ">
        <div class="  overflow-x-auto w-full  ">
            <table class="min-w-full table-auto  ">
                <thead>
                    <tr class="bg-[#cd853f] text-white uppercase  leading-normal ">
                        <th class="py-3 px-6"></th>
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
                        {{-- Method --}}
                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center justify-center">
                                <span class="font-bold">COD</span>
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
                            <div class="flex  item-center justify-center">
                                    {{-- Reject --}}
                                    <div class="cursor-pointer w-5 ml-2 transform   text-gray-500 hover:scale-110">
                                        @svg('zondicon-view-show', 'w-5 h-5 hover:bg-gray-300 rounded-lg')
                                    </div>
                                 {{-- Reject --}}
                                <div class="cursor-pointer w-5 ml-2 mr-2 transform   text-red-500 hover:scale-110">
                                    @svg('fas-xmark','w-5 h-5 hover:bg-red-300 rounded-lg')
                                </div>
                                {{-- Accept --}}
                                <div class="cursor-pointer w-[26px] transform text-green-500 hover:scale-110">
                                    @svg('vaadin-check', 'w-5 h-5 hover:bg-green-300 rounded-lg')
                                </div>
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
                        {{-- Method --}}
                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center justify-center">
                                <span class="font-bold">COD</span>
                            </div>
                        </td>
                        
                        {{-- Status --}}
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <div class="flex items-center justify-center shadow-md rounded-lg bg-green-200 shadow-green-300">
                                <span class=" py-1 px-3 rounded-full font-bold text-sm text-green-600">Completed</span>
                            </div>
                        </td>
                        {{-- Action --}}
                        <td class="py-3 px-6 text-center">
                       
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
                        {{-- Method --}}
                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center justify-center">
                                <span class="font-bold">COD</span>
                            </div>
                        </td>
                        
                        {{-- Status --}}
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <div class="flex items-center justify-center shadow-md rounded-lg bg-red-200 shadow-red-300">
                                <span class=" py-1 px-3 rounded-full font-bold text-sm text-red-500">Fail</span>
                            </div>
                        </td>
                        {{-- Action --}}
                        <td class="py-3 px-6 text-center">
                          
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
                        {{-- Method --}}
                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center justify-center">
                                <span class="font-bold">COD</span>
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
                            <div class="flex  item-center justify-center">
                                    {{-- Reject --}}
                                    <div class="cursor-pointer w-5 ml-2 transform   text-gray-500 hover:scale-110">
                                        @svg('zondicon-view-show', 'w-5 h-5 hover:bg-gray-300 rounded-lg')
                                    </div>
                                 {{-- Reject --}}
                                <div class="cursor-pointer w-5 ml-2 mr-2 transform   text-red-500 hover:scale-110">
                                    @svg('fas-xmark','w-5 h-5 hover:bg-red-300 rounded-lg')
                                </div>
                                {{-- Accept --}}
                                <div class="cursor-pointer w-[26px] transform text-green-500 hover:scale-110">
                                    @svg('vaadin-check', 'w-5 h-5 hover:bg-green-300 rounded-lg')
                                </div>
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
                        {{-- Method --}}
                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center justify-center">
                                <span class="font-bold">COD</span>
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
                            <div class="flex  item-center justify-center">
                                    {{-- Reject --}}
                                    <div class="cursor-pointer w-5 ml-2 transform   text-gray-500 hover:scale-110">
                                        @svg('zondicon-view-show', 'w-5 h-5 hover:bg-gray-300 rounded-lg')
                                    </div>
                                 {{-- Reject --}}
                                <div class="cursor-pointer w-5 ml-2 mr-2 transform   text-red-500 hover:scale-110">
                                    @svg('fas-xmark','w-5 h-5 hover:bg-red-300 rounded-lg')
                                </div>
                                {{-- Accept --}}
                                <div class="cursor-pointer w-[26px] transform text-green-500 hover:scale-110">
                                    @svg('vaadin-check', 'w-5 h-5 hover:bg-green-300 rounded-lg')
                                </div>
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
                        {{-- Method --}}
                        <td class="py-3 px-6 text-center">
                            <div class="flex items-center justify-center">
                                <span class="font-bold">COD</span>
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
                            <div class="flex  item-center justify-center">
                                    {{-- Reject --}}
                                    <div class="cursor-pointer w-5 ml-2 transform   text-gray-500 hover:scale-110">
                                        @svg('zondicon-view-show', 'w-5 h-5 hover:bg-gray-300 rounded-lg')
                                    </div>
                                 {{-- Reject --}}
                                <div class="cursor-pointer w-5 ml-2 mr-2 transform   text-red-500 hover:scale-110">
                                    @svg('fas-xmark','w-5 h-5 hover:bg-red-300 rounded-lg')
                                </div>
                                {{-- Accept --}}
                                <div class="cursor-pointer w-[26px] transform text-green-500 hover:scale-110">
                                    @svg('vaadin-check', 'w-5 h-5 hover:bg-green-300 rounded-lg')
                                </div>
                            </div>
                        </td>
                    </tr>
                  
                </tbody>
            </table>
        </div>
    </div>
    
</div>
