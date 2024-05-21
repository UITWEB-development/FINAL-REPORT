<?php

namespace App\Helpers;

use App\Models\Role;

function getUserTypes() {
    try {
        $user_types = Role::pluck('name')->toArray();
    } catch (\Throwable $th) {
        $user_types = [];
    }

    return $user_types;
}