<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\OrderAddress;
use App\Models\OrderDetail;
use Livewire\Component;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\On;
use Illuminate\Validation\ValidationException;
use Masmerise\Toaster\Toaster;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PayOS\PayOS;

class RestaurantCheckoutPage extends Component
{

    public User $restaurant;

    public $phone_number;
    public $address;
    public $payment_method = 'cod';

    public $selectedProvince;
    public $selectedDistrict;
    public $selectedWard;

    

    public function mount($id) {
        $this->restaurant = User::find($id);
    }

    public function updatedSelectedProvince() {
        if ($this->selectedProvince == -1) {
            $this->selectedDistrict = -1;
            $this->selectedWard = -1; 
        }
    }

    public function order() {
        

        $validator = Validator::make(
            [
                'phone_number' => $this->phone_number,
                'address' => $this->address,
                'ward' => $this->selectedWard,
                'payment_method' => $this->payment_method
            ],
            [
                'phone_number' => 'required|phone:VN',
                'address' => 'required|string|between:3,100',
                'ward' => 'required|exists:wards,id',
                'payment_method' => 'required|string|in:cod,payos' 
            ],
        );

        if ($validator->fails()) {
            $errors = $validator->errors()->all();

            foreach ($errors as $error) {   
                Toaster::error($error);

            }

            throw new ValidationException($validator);
        }

        $cart = Cart::instance($this->restaurant->id)->content();
        

        $is_error_occur = false;
        foreach ($cart as $cartProduct) {
            $product = $cartProduct->model;
            if (!$product->is_available) {
                Toaster::error('Product ' . $product->name . ' is out of stock');
                $is_error_occur = true;
            }
        }

        if ($is_error_occur) {
            return;
        }
        
        try {
            DB::transaction(function () use ($cart) {

                if ($this->payment_method == 'payos') {
                    $status = 'Unpaid';
                } else {
                    $status = 'Pending';
                }

                $latestOrder = Order::orderBy('order_date', 'DESC')->first();

                if (!$latestOrder) {
                    $orderCode = 1;
                } else {
                    $orderCode = $latestOrder->code + 1;
                }

                $order = Order::create([
                    'user_id' => auth()->user()->id,
                    'restaurant_id' => $this->restaurant->id,
                    'order_date' => now(),
                    'status' => $status,
                    'payment_method' => $this->payment_method,
                    'total' => (int)Cart::total(0, '', '') + 30000,
                    'code' => $orderCode,
                ]);


                OrderAddress::create([
                    'order_id' => $order->id,
                    'ward_id' => $this->selectedWard,
                    'address' => $this->address,
                    'phone_number' => $this->phone_number
                ]);

                foreach ($cart as $cartProduct) {
                    OrderDetail::create([
                        'order_id' => $order->id,
                        'product_id' => $cartProduct->model->id,
                        'price' => $cartProduct->price,
                        'qty' => $cartProduct->qty,
                    ]);
                }

                Cart::destroy();
                $this->dispatch('cart-updated')->to(CartNav::class);

                if ($this->payment_method == 'payos') {
                    
                    $YOUR_DOMAIN = "http://localhost:8000";

                    $data = [
                        "orderCode" => $orderCode,
                        "amount" => $order->total,
                        "description" => "Thanh toán đơn hàng " . $order->code,
                        "returnUrl" => $YOUR_DOMAIN . "/payment/handling",
                        "cancelUrl" => $YOUR_DOMAIN . "/payment/handling"
                    ];


                    $PAYOS_CLIENT_ID = env('PAYOS_CLIENT_ID');
                    $PAYOS_API_KEY = env('PAYOS_API_KEY');
                    $PAYOS_CHECKSUM_KEY = env('PAYOS_CHECKSUM_KEY');

                    $payOS = new PayOS($PAYOS_CLIENT_ID, $PAYOS_API_KEY, $PAYOS_CHECKSUM_KEY);

                    $response = $payOS->createPaymentLink($data);
                    return redirect($response['checkoutUrl']);

                }

                return Redirect::route('restaurant.order', ['id' => $this->restaurant->id, 'order_id' => $order->id])->success('Order purchased successfully');
            });


        } catch (\Exception $exception) {
            dd($exception);
            /* Toaster::error('Error happened. Try again or contact us'); */
        }

    }

    #[On('cart_row_updated')]
    public function render()
    {
        Cart::instance($this->restaurant->id);
        $cart = Cart::content();

        return view('livewire.restaurant-checkout-page', ['cart' => $cart, 'user' => auth()->user()])
        ->layout('components.layouts.restaurant', ['restaurant' => $this->restaurant])
        ->title($this->restaurant->restaurant_description->restaurant_name.' - Checkout');
    }
}
