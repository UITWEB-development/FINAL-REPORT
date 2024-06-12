<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;

class OrderPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function confirm(User $restaurant, Order $order): bool
    {
        return $order->restaurant_id == $restaurant->id && $order->status == 'Pending';
    }

    public function cancel(User $restaurant, Order $order): bool
    {
        return $order->restaurant_id == $restaurant->id && ($order->status == 'Pending' || $order->status == 'Unpaid');
    }

    public function complete(User $restaurant, Order $order): bool
    {
        return $order->restaurant_id == $restaurant->id && $order->status == 'Delivery';
    }

    public function cancel_user(User $user, Order $order): bool
    {
        return $order->user_id == $user->id && ($order->status == 'Pending' || $order->status == 'Unpaid');
    }

}
