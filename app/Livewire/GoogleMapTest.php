<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class GoogleMapTest extends Component
{
    public $API_KEY = 'AIzaSyBVuLGd_6m7_Z4mpZm8lzguC6tZs37vyrE';

    public $lat = 25.344;
    public $lng = -31.031;

    #[On('pin-updated')]
    public function update() {
        
    }

    public function render()
    {
        return view('livewire.google-map-test');
    }


}
