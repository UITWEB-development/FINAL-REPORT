<?php

namespace App\Policies;

use App\Models\RestaurantDescription;
use App\Models\User;

class RestaurantDescriptionPolicy
{

    public function add(User $user): bool
    {
        return $user->role_id === 1;
    }

    public function update(User $user, RestaurantDescription $restaurant_description){
        return $restaurant_description->user_id === $user->id;
    }
}
