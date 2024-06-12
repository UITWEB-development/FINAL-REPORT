<div wire:poll.5s class="px-5 mb-6">
    <div class="mb-6">
        <div class="border-b-2 border-black">
            <h2 class="mb-2 text-3xl font-semibold">Dashboard</h2>
            <h3 class="mb-8 text-sm font-medium text-slate-500">
                Welcome {{ auth()->user()->name }}, everything looks great!
            </h3>
        </div>
        <div class="grid grid-cols-1 ">
            <div class="container mx-auto lg:px-4 py-8 md:px-36 sm:px-24 px-20">
                <div class="grid gap-8 lg:grid-cols-5 grid-cols-1  ">
                    <div class="flex items-center justify-center p-4 bg-[#ffefd5] shadow-md shadow-slate-400">
                        <div class=" text-center">
                            <p
                                class=" font-bold  text-[2.3cqmin] md:text-[3cqmin] sm:text-[2.5cqmin] lg:text-[2.5cqmin]">
                                Total Menus
                            </p>
                            <p class=" text-[5cqmin] md:text-[5cqmin] sm:text-[5cqmin] lg:text-[6cqmin] font-semibold">
                                {{$productCount}}
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center justify-center p-4 bg-[#ffefd5] shadow-md shadow-slate-400">
                        <div class="text-center">
                            <p
                                class=" font-bold  text-[2.3cqmin] md:text-[3cqmin] sm:text-[2.5cqmin] lg:text-[2.5cqmin]">
                                Total Orders
                            </p>
                            <p class=" text-[5cqmin] md:text-[5cqmin] sm:text-[5cqmin] lg:text-[6cqmin] font-semibold">
                                {{$orderCount}}
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center justify-center p-4 bg-[#ffefd5] shadow-md shadow-slate-400">
                        <div class=" text-center">
                            <p
                                class=" font-bold  text-[2.3cqmin] md:text-[3cqmin] sm:text-[2.5cqmin] lg:text-[2.5cqmin]">
                                Total Customers
                            </p>
                            <p class=" text-[5cqmin] md:text-[5cqmin] sm:text-[5cqmin] lg:text-[6cqmin] font-semibold">
                                {{$customerCount}}
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center justify-center p-4 bg-[#ffefd5] shadow-md shadow-slate-400">
                        <div class="text-center">
                            <p
                                class=" font-bold  text-[2.3cqmin] md:text-[3cqmin] sm:text-[2.5cqmin] lg:text-[2.5cqmin]">
                                Total Revenue
                            </p>
                            <p class="text-[3cqmin] md:text-[3cqmin] sm:text-[3cqmin] lg:text-[3.5cqmin] font-semibold">
                                {{ number_format($totalRevenue, 0, ',', '.') }} VND
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center justify-center p-4 bg-[#ffefd5] shadow-md shadow-slate-400">
                        <div class="text-center">
                            <p
                                class=" font-bold  text-[2.3cqmin] md:text-[3cqmin] sm:text-[2.5cqmin] lg:text-[2.5cqmin]">
                                Unpaid Amount
                            <p class=" text-[3cqmin] md:text-[3cqmin] sm:text-[3cqmin] lg:text-[3.5cqmin] font-semibold">
                                {{ number_format($unpaidAmount, 0, ',', '.') }} VND
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-6 col-span-3 items-center justify-center ">
                <div class="shadow rounded relative h-[40vh] w-full border-2 border-[#CD853F]">
                    <select wire:model.live="selectedYearRevenue" class="absolute right-0 top-0 z-10  border-gray-300">
                        @foreach ($years as $year)
                            <option value="{{$year}}">{{$year}}</option>
                        @endforeach
                    </select>
                    <livewire:livewire-line-chart
                        key="{{ $revenueLineChartModel->reactiveKey() }}"
                        :line-chart-model="$revenueLineChartModel"
                    />
                </div>
                <div class="shadow rounded relative h-[40vh] w-full border-2 border-[#CD853F]">
                    <select wire:model.live="selectedYearOrder" class="absolute right-0 top-0 z-10  border-gray-300">
                        @foreach ($years as $year)
                            <option value="{{$year}}">{{$year}}</option>
                        @endforeach
                    </select>
                    <livewire:livewire-line-chart
                        key="{{ $orderLineChartModel->reactiveKey() }}"
                        :line-chart-model="$orderLineChartModel"
                    />
                </div>
            </div>
        </div>
    </div>

</div>
