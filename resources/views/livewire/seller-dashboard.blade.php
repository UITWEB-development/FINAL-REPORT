<div wire:poll.>
    <h2 class="mb-2 text-3xl font-semibold">Dashboard</h2>
    <h3 class="mb-8 text-sm font-medium text-slate-500">
        Welcome {{auth()->user()->name}}, everything looks great!
    </h3>

    <div class="flex flex-col gap-10">
        <div class="shadow rounded p-4 border bg-white relative" style="height: 32rem;">
            <select wire:model.live="selectedYear" class="absolute right-0 top-0 z-10  border-gray-300">
                @foreach ($years as $year)
                    <option value="{{$year}}">{{$year}}</option>
                @endforeach
            </select>
            <livewire:livewire-line-chart
                key="{{ $lineChartModel->reactiveKey() }}"
                :line-chart-model="$lineChartModel"
            />
        </div>
    </div>
</div>
