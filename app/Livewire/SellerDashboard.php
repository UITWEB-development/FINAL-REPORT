<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Constants\DashboardConstants;
use App\Models\Order;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Asantibanez\LivewireCharts\Models\LineChartModel;
use Illuminate\Support\Facades\DB;

#[Title('Seller Dashboard')] 
class SellerDashboard extends Component
{
    public $selectedYear;

    public $years;

    public function mount() {
        $this->selectedYear = now()->year;
        $from = auth()->user()->created_at->year;
        $this->years = range($from, $this->selectedYear);
        
    }

    public function render()
    {
        $months = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December',
        ];

        $orderData = DB::table('orders')
            ->selectRaw("MONTHNAME(created_at) as month, SUM(orders.total) as total")
            ->groupByRaw("MONTHNAME(created_at)")
            ->where(['restaurant_id' => auth()->user()->id, 'status' => 'Completed'])
            ->whereYear('created_at', $this->selectedYear)
            ->get()
            ->map(fn ($row) => get_object_vars($row))
            ->mapWithKeys(function($item) {
                return [$item['month'] => $item['total']];
            });

        $orderLineChartModel = 
            (new LineChartModel())
            ->setTitle('Revenue')
            ->setAnimated(true)
            ->setSmoothCurve()
            ->setXAxisVisible(true);

        foreach ($months as $month) {
            if (isset($orderData[$month])) {
                $orderLineChartModel->addPoint($month, $orderData[$month]);
            } else {
                $orderLineChartModel->addPoint($month, 0);
            }
        }


        $chartConfig = [
            'yaxis.labels.formatter' => '(val) => `${val}`',
            'yaxis.title' => ['text' => 'VND'],
            'tooltip.y.formatter' => '(val) => `${val} VND`'
        ];

        if (now()->year == $this->selectedYear) {
            $chartConfig['annotations.xaxis'] = [['x'=> $months[now()->month-1], 'borderColor' => '#D29A39', 'borderWidth' => 3, 'strokeDashArray' => 8, 'label' => ['text' => 'Current month', 'borderColor' => '#D8985B', 'orientation' => 'horizontal', 'style' => ['color' => 'white', 'background' => '#D29A39', 'font-weight' => 'bold', 'padding' => ['left' => 10, 'right' => 10, 'top' => 5, 'bottom' => 5]]]]];
        }

        $orderLineChartModel->setJsonConfig($chartConfig);

        return view('livewire.seller-dashboard', ['orderLineChartModel' => $orderLineChartModel])
            ->layout('components.layouts.dashboard', DashboardConstants::SELLER_DASHBOARD_MENU);
    }
}
