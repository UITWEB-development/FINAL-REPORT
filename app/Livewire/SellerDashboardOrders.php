<?php

namespace App\Livewire;

use App\Constants\DashboardConstants;
use App\Constants\OrderActionConstants;
use Livewire\Component;
use Livewire\Attributes\Title;
use App\Constants\OrderStateConstants;
use App\Models\Order;
use Masmerise\Toaster\Toaster;
use PayOS\PayOS;

#[Title('Seller Dashboard - Orders')]
class SellerDashboardOrders extends Component
{
    public function show($id) {        
        $this->dispatch('openModal', component: 'show-order-seller', arguments: ['order' => $id]);
    }

    public function cancel($id){
        $order = Order::find($id);
        $this->authorize('cancel', $order);


        if ($order->status == 'Unpaid') {
            $PAYOS_CLIENT_ID = env('PAYOS_CLIENT_ID');
            $PAYOS_API_KEY = env('PAYOS_API_KEY');
            $PAYOS_CHECKSUM_KEY = env('PAYOS_CHECKSUM_KEY');

            $payOS = new PayOS($PAYOS_CLIENT_ID, $PAYOS_API_KEY, $PAYOS_CHECKSUM_KEY);

            try {
                $payOS->cancelPaymentLink($order->code, "Hủy đơn hàng");
            } catch (\Throwable $th) {
                Toaster::error($th->getMessage());
            }
        }

        $order->status = 'Cancelled';
        $order->save();
        Toaster::success('Order status updated!');

    }

    public function confirm($id) {
        $order = Order::find($id);
        $this->authorize('confirm', $order);
        $order->status = 'Delivery';
        $order->save();
        Toaster::success('Order status updated!');
    }

    public function complete($id) {
        $order = Order::find($id);
        $this->authorize('complete', $order);
        $order->status = 'Completed';
        $order->save();
        Toaster::success('Order status updated!');
    }

    public function fail($id) {
        $order = Order::find($id);
        $this->authorize('complete', $order);
        $order->status = 'Failed';
        $order->save();
        Toaster::success('Order status updated!');
    }

    public function render()
    {
        $user = auth()->user();
        $orders = $user->orders;
        return view('livewire.seller-dashboard-orders', ['user' => $user, 'orders'=> $orders, 'styles' => OrderStateConstants::STYLES, 'actions' => OrderActionConstants::ORDER_ACTIONS])
            ->layout('components.layouts.dashboard', DashboardConstants::SELLER_DASHBOARD_MENU);
    }
}
