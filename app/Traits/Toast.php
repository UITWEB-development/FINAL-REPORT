<?php

namespace App\Traits;



trait Toast {
    /* 
    Expected array item: 
    id - Unique ID for the toast
    show - a boolean value to show or hide the toast
    message - The title message of the toast
    description - The description text for the toast
    type - The type of the toast (default, success, info, warning, danger)
    html - Custom HTML to be used inside of the toast
    */
    public function toast(array $data){
        $this->dispatch('toast', ...$data);
    }
}