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
    public $selectedYearRevenue;
    public $selectedYearOrder;

    public $years;

    public function mount()
    {
        $this->selectedYearRevenue = now()->year;
        $from = auth()->user()->created_at->year;
        $this->years = range($from, $this->selectedYearRevenue);
    }

    public function render()
    {
        /* First section */
        $restaurant = auth()->user();
        $productCount = DB::table('products')
            ->where('user_id', '=', $restaurant->id)
            ->count();
        $orderCount = DB::table('orders')
            ->where('restaurant_id', '=', $restaurant->id)
            ->count();
        $customerCount = DB::table('orders')
            ->where('restaurant_id', '=', $restaurant->id)
            ->distinct()
            ->count('user_id');
        $totalRevenue = DB::table('orders')
            ->selectRaw('SUM(orders.total) as total')
            ->where(['restaurant_id' => $restaurant->id, 'status' => 'Completed'])
            ->first();

        $unpaidAmount = DB::table('orders')
            ->selectRaw('SUM(orders.total) as total')
            ->where('restaurant_id', $restaurant->id)
            ->where(function ($query) {
                $query->where('status', '=', 'Unpaid')->orWhere('status', '=', 'Pending');
            })
            ->first();

        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        /* Second section */

        $revenueData = DB::table('orders')
            ->selectRaw('MONTHNAME(created_at) as month, SUM(orders.total) as total')
            ->groupByRaw('MONTHNAME(created_at)')
            ->where(['restaurant_id' => auth()->user()->id, 'status' => 'Completed'])
            ->whereYear('created_at', $this->selectedYearRevenue)
            ->get()
            ->map(fn($row) => get_object_vars($row))
            ->mapWithKeys(function ($item) {
                return [$item['month'] => $item['total']];
            });

        $revenueLineChartModel = (new LineChartModel())->setTitle('Revenue')->setAnimated(true)->setSmoothCurve()->setXAxisVisible(true);

        foreach ($months as $month) {
            if (isset($revenueData[$month])) {
                $revenueLineChartModel->addPoint($month, $revenueData[$month]);
            } else {
                $revenueLineChartModel->addPoint($month, 0);
            }
        }

        $revenueChartConfig = [
            'yaxis.labels.formatter' => '(val) => `${val}`',
            'yaxis.title' => ['text' => 'VND'],
            'tooltip.y.formatter' => '(val) => `${val} VND`',
        ];

        if (now()->year == $this->selectedYearRevenue) {
            $revenueChartConfig['annotations.xaxis'] = [['x' => $months[now()->month - 1], 'borderColor' => '#D29A39', 'borderWidth' => 3, 'strokeDashArray' => 8, 'label' => ['text' => 'Current month', 'borderColor' => '#D8985B', 'orientation' => 'horizontal', 'style' => ['color' => 'white', 'background' => '#D29A39', 'font-weight' => 'bold', 'padding' => ['left' => 10, 'right' => 10, 'top' => 5, 'bottom' => 5]]]]];
        }

        $revenueLineChartModel->setJsonConfig($revenueChartConfig);

        /* Third section */
        $orderData = DB::table('orders')
            ->selectRaw('MONTHNAME(created_at) as month, COUNT(*) as count')
            ->groupByRaw('MONTHNAME(created_at)')
            ->where(['restaurant_id' => auth()->user()->id, 'status' => 'Completed'])
            ->whereYear('created_at', $this->selectedYearOrder)
            ->get()
            ->map(fn($row) => get_object_vars($row))
            ->mapWithKeys(function ($item) {
                return [$item['month'] => $item['count']];
            });

        $orderLineChartModel = (new LineChartModel())->setTitle('Successful orders')->setAnimated(true)->setSmoothCurve()->setXAxisVisible(true);

        foreach ($months as $month) {
            if (isset($orderData[$month])) {
                $orderLineChartModel->addPoint($month, $orderData[$month]);
            } else {
                $orderLineChartModel->addPoint($month, 0);
            }
        }

        if (now()->year == $this->selectedYearOrder) {
            $orderChartConfig = [
                'annotations.xaxis' => [['x' => $months[now()->month - 1], 'borderColor' => '#D29A39', 'borderWidth' => 3, 'strokeDashArray' => 8, 'label' => ['text' => 'Current month', 'borderColor' => '#D8985B', 'orientation' => 'horizontal', 'style' => ['color' => 'white', 'background' => '#D29A39', 'font-weight' => 'bold', 'padding' => ['left' => 10, 'right' => 10, 'top' => 5, 'bottom' => 5]]]]]
            ];

            $orderLineChartModel->setJsonConfig($revenueChartConfig);
        }

        return view('livewire.seller-dashboard', ['revenueLineChartModel' => $revenueLineChartModel, 'orderLineChartModel' => $orderLineChartModel, 'productCount' => $productCount, 'orderCount' => $orderCount, 'customerCount' => $customerCount, 'totalRevenue' => $totalRevenue->total, 'unpaidAmount' => $unpaidAmount->total])->layout('components.layouts.dashboard', DashboardConstants::SELLER_DASHBOARD_MENU);
    }
}
