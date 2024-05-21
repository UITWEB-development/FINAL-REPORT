<?php

namespace App\Traits;

use App\Models\Role;

trait UserTypeMount {
    public function mount($user_type) {
        $role = Role::where('name', $user_type)->firstOrFail();
        $this->user_type = $user_type;
        $this->role_id = $role->id;
    }
}