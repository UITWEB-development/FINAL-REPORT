<?php

namespace App\Livewire;

use App\Constants\OrderMessageConstants;
use App\Models\Order;
use App\Models\User;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Masmerise\Toaster\Toaster;
use PayOS\PayOS;

class OrderPage extends Component
{
    public User $restaurant;
    public Order $order;
    public $payment_url;
    public $order_fetch_message;
    

    public function mount($id, $order_id) {
        $this->restaurant = User::findOrFail($id);
        $this->order = Order::findOrFail($order_id);

        $PAYOS_CLIENT_ID = env('PAYOS_CLIENT_ID');
        $PAYOS_API_KEY = env('PAYOS_API_KEY');
        $PAYOS_CHECKSUM_KEY = env('PAYOS_CHECKSUM_KEY');

        $payOS = new PayOS($PAYOS_CLIENT_ID, $PAYOS_API_KEY, $PAYOS_CHECKSUM_KEY);

        if ($this->order->status == 'Unpaid') {
            try {
                $response = $payOS->getPaymentLinkInformation($this->order->code);
                switch ($response['status']) {
                    case 'PENDING':
                        $this->payment_url = 'https://pay.payos.vn/web/' . $response['id'];
                        $this->order->status = 'Unpaid';
                        
                        break;
                    case 'CANCELLED':
                        $this->order->status = 'Cancelled';
                        break;
                    case 'PAID':
                        $this->order->status = 'Pending';
                        break;
                    
                    default:
                        # code...
                        break;
                }
    
                $this->order->save();
            } catch (\Throwable $th) {
                $this->order_fetch_message = $th->getMessage();
            }
        }

    }

    public function cancel() {
        $this->authorize('cancel_user', $this->order);
        if ($this->order->status == 'Unpaid') {
            $PAYOS_CLIENT_ID = env('PAYOS_CLIENT_ID');
            $PAYOS_API_KEY = env('PAYOS_API_KEY');
            $PAYOS_CHECKSUM_KEY = env('PAYOS_CHECKSUM_KEY');

            $payOS = new PayOS($PAYOS_CLIENT_ID, $PAYOS_API_KEY, $PAYOS_CHECKSUM_KEY);

            try {
                $payOS->cancelPaymentLink($this->order->code, "Hủy đơn hàng");
                $this->payment_url = null;
            } catch (\Throwable $th) {
                Toaster::error($th->getMessage());
            }
        }

        
        $this->order->status = 'Cancelled';
        $this->order->save();
    }

    public function render()
    {
        Cart::instance($this->restaurant->id);
        $cart = Cart::content();

        return view('livewire.order-page', ['cart' => $cart, 'order_messages' => OrderMessageConstants::ORDER_STATUS_MESSAGE])
        ->layout('components.layouts.restaurant', ['restaurant' => $this->restaurant])
        ->title($this->restaurant->restaurant_description->restaurant_name.' - Order status');
        
    }
}
