<?php

namespace App\Livewire;

use App\Models\Order;
use LivewireUI\Modal\ModalComponent;


class ShowOrderSeller extends ModalComponent
{
    public Order $order;
    public function render()
    {
        return view('livewire.show-order-seller');
    }
}
