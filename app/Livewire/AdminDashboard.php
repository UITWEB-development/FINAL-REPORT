<?php

namespace App\Livewire;

use App\Constants\DashboardConstants;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\Attributes\Title;
use Asantibanez\LivewireCharts\Models\LineChartModel;

#[Title('Admin Dashboard')]
class AdminDashboard extends Component
{
    public $selectedYearPlatformRevenue;
    public $selectedYearNewRestaurant;
    public $years;

    public function mount()
    {
        $this->selectedYearPlatformRevenue = now()->year;
        $this->selectedYearNewRestaurant = now()->year;
        $from = 2020;
        $this->years = range($from, $this->selectedYearPlatformRevenue);
    }
    public function render()
    {
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        /* Platform revenue chart */
        $platformRevenueData = DB::table('orders')
            ->selectRaw('MONTHNAME(created_at) as month, SUM(orders.total) as total')
            ->groupByRaw('MONTHNAME(created_at)')
            ->where(['status' => 'Completed'])
            ->whereYear('created_at', $this->selectedYearPlatformRevenue)
            ->get()
            ->map(fn($row) => get_object_vars($row))
            ->mapWithKeys(function ($item) {
                return [$item['month'] => $item['total']];
            });

        $platformRevenueChartModel = (new LineChartModel())->setTitle('Platform revenue')->setAnimated(true)->setSmoothCurve()->setXAxisVisible(true);

        foreach ($months as $month) {
            if (isset($platformRevenueData[$month])) {
                $platformRevenueChartModel->addPoint($month, $platformRevenueData[$month]);
            } else {
                $platformRevenueChartModel->addPoint($month, 0);
            }
        }

        $platformRevenueChartConfig = [
            'yaxis.labels.formatter' => '(val) => `${val}`',
            'yaxis.title' => ['text' => 'VND'],
            'tooltip.y.formatter' => '(val) => `${val} VND`',
        ];

        if (now()->year == $this->selectedYearPlatformRevenue) {
            $platformRevenueChartConfig['annotations.xaxis'] = [['x' => $months[now()->month - 1], 'borderColor' => '#D29A39', 'borderWidth' => 3, 'strokeDashArray' => 8, 'label' => ['text' => 'Current month', 'borderColor' => '#D8985B', 'orientation' => 'horizontal', 'style' => ['color' => 'white', 'background' => '#D29A39', 'font-weight' => 'bold', 'padding' => ['left' => 10, 'right' => 10, 'top' => 5, 'bottom' => 5]]]]];
        }

        $platformRevenueChartModel->setJsonConfig($platformRevenueChartConfig);

        /* New restaurant chart */
        $newRestaurantData = DB::table('users')
            ->join('restaurant_descriptions', function ($query) {
                $query->on('users.id', '=', 'restaurant_descriptions.user_id');
            })
            ->selectRaw('MONTHNAME(users.created_at) as month, COUNT(*) as count')
            ->groupByRaw('MONTHNAME(users.created_at)')
            ->whereYear('users.created_at', $this->selectedYearNewRestaurant)
            ->get()
            ->map(fn($row) => get_object_vars($row))
            ->mapWithKeys(function ($item) {
                return [$item['month'] => $item['count']];
            });

        $newRestaurantChartModel = (new LineChartModel())->setTitle('New restaurants')->setAnimated(true)->setSmoothCurve()->setXAxisVisible(true);

        foreach ($months as $month) {
            if (isset($newRestaurantData[$month])) {
                $newRestaurantChartModel->addPoint($month, $newRestaurantData[$month]);
            } else {
                $newRestaurantChartModel->addPoint($month, 0);
            }
        }

        if (now()->year == $this->selectedYearNewRestaurant) {
            $newRestaurantChartConfig = [
                'annotations.xaxis' => [['x' => $months[now()->month - 1], 'borderColor' => '#D29A39', 'borderWidth' => 3, 'strokeDashArray' => 8, 'label' => ['text' => 'Current month', 'borderColor' => '#D8985B', 'orientation' => 'horizontal', 'style' => ['color' => 'white', 'background' => '#D29A39', 'font-weight' => 'bold', 'padding' => ['left' => 10, 'right' => 10, 'top' => 5, 'bottom' => 5]]]]]
            ];

            $newRestaurantChartModel->setJsonConfig($newRestaurantChartConfig);
        }

        

        return view('livewire.admin-dashboard', ['platformRevenueChartModel' => $platformRevenueChartModel, 'newRestaurantChartModel' => $newRestaurantChartModel])->layout('components.layouts.dashboard', DashboardConstants::ADMIN_DASHBOARD_MENU);
    }
}
