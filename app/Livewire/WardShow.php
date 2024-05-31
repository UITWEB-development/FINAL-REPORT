<?php

namespace App\Livewire;

use App\Models\Ward;
use Livewire\Component;

class WardShow extends Component
{
    public function render()
    {
        return view('livewire.ward-show', ['wards' => Ward::all()]);
    }
}
