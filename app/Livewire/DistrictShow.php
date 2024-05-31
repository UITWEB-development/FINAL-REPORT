<?php

namespace App\Livewire;

use App\Models\District;
use Livewire\Component;

class DistrictShow extends Component
{
    public function render()
    {
        return view('livewire.district-show', ['districts' => District::all()]);
    }
}
