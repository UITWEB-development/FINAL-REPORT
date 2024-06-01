<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Modelable;

class AlpineGoogleMap extends Component
{
    #[Modelable]
    public $position = ['lat' => null, 'lng' => null];
    
    public function submit() {
        dd($this->position);
    }
    public function render()
    {
        return view('livewire.alpine-google-map');
    }
}
