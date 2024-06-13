<div wire:poll.5s class="px-5 mb-6">
    <div class="mb-6">
        <div>
            <h2 class="mb-2 text-3xl font-semibold">Dashboard</h2>
            <h3 class="mb-8 text-sm font-medium text-slate-500">
                Welcome {{ auth()->user()->name }}, everything looks great!
            </h3>
        </div>
        <div class="grid grid-cols-1 ">
            <div class="flex flex-col gap-6 col-span-3 items-center justify-center ">
                <div class="shadow rounded relative h-[32vh] w-full border-2 border-[#CD853F]">
                    <select wire:model.live="selectedYearPlatformRevenue" class="absolute right-0 top-0 z-10  border-gray-300">
                        @foreach ($years as $year)
                            <option value="{{$year}}">{{$year}}</option>
                        @endforeach
                    </select>
                    <livewire:livewire-line-chart
                        key="{{ $platformRevenueChartModel->reactiveKey() }}"
                        :line-chart-model="$platformRevenueChartModel"
                    />
                </div>
                <div class="shadow rounded relative h-[32vh] w-full border-2 border-[#CD853F]">
                    <select wire:model.live="selectedYearNewRestaurant" class="absolute right-0 top-0 z-10  border-gray-300">
                        @foreach ($years as $year)
                            <option value="{{$year}}">{{$year}}</option>
                        @endforeach
                    </select>
                    <livewire:livewire-line-chart
                        key="{{ $newRestaurantChartModel->reactiveKey() }}"
                        :line-chart-model="$newRestaurantChartModel"
                    />
                </div>
            </div>
        </div>
    </div>

</div>
