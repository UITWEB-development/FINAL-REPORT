<?php

namespace App\Livewire;

use App\Constants\OrderActionConstants;
use App\Constants\OrderStateConstants;
use App\Models\Order;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Title;
use Masmerise\Toaster\Toaster;
use Livewire\Attributes\On;
use PayOS\PayOS;


#[Layout('components.layouts.user-dashboard')]
#[Title('User Profile')] 
class UserDashboard extends Component
{

    public function show($id) {
        $this->dispatch('openModal', component: 'show-order-user', arguments: ['order' => $id]);
    }
    public function cancel($id) {
        $order = Order::find($id);
        $this->authorize('cancel_user', $order);
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
    }



    #[On('user_updated')]
    public function render()
    {
        $user = auth()->user();
        $orders = $user->orders;
        return view('livewire.user-dashboard', ['user' => $user, 'orders'=> $orders, 'styles' => OrderStateConstants::STYLES, 'actions' => OrderActionConstants::USER_ORDER_ACTIONS]);
    }
}
