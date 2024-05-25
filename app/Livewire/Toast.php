<?php

namespace App\Livewire;

use App\Traits\Toast as TraitsToast;
use Livewire\Component;

class Toast extends Component
{
    use TraitsToast;
    public function render()
    {
        return view('livewire.toast');
    }
}
