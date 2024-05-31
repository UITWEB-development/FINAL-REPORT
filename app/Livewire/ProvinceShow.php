<?php

namespace App\Livewire;

use App\Models\Province;
use Livewire\Component;

class ProvinceShow extends Component
{
    public function render()
    {
        return view('livewire.province-show', ['provinces' => Province::all()]);
    }
}
