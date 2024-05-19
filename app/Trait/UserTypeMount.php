<?php

namespace App\Trait;

trait UserTypeMount {
    public function mount($user_type) {
        if ($user_type === 'seller') {
            $this->role_id = 1; 
        } else {
            $this->role_id = 2;
        }  

        $this->user_type = $user_type;
        
    }
}