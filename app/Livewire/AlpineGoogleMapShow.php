<?php

namespace App\Livewire;

use Livewire\Component;

class AlpineGoogleMapShow extends Component
{
    public $lat = 0;
    public $lng = 0;
    public $name = '';
    public $address = '';
    public function render()
    {
        return view('livewire.alpine-google-map-show');
    }
}
