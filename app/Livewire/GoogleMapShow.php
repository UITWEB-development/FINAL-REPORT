<?php

namespace App\Livewire;

use Livewire\Component;

class GoogleMapShow extends Component
{

    public float $lat = 123;
    public float $lng = 123;


    public function render()
    {
        return view('livewire.google-map-show');
    }
}
