<?php

namespace App\Livewire;

use Livewire\Attributes\Locked;
use Livewire\Component;

class Signout extends Component
{   
    #[Locked]
    public string $signin_route;

    public function mount(string $signin_route) {
        $this->signin_route = $signin_route;
    }

    public function signout() {
        $user = auth()->user();
        $user->remember_token = null;
        $user->save();
        
        auth()->logout();
        session()->invalidate();
        session()->regenerateToken();
        
        $this->redirect($this->signin_route);
    }
    public function render()
    {
        return view('livewire.signout');
    }
}
