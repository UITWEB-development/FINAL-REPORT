<?php

namespace App\Livewire;

use Livewire\Component;

class HomeSignout extends Component
{

    public function signout() {
        $user = auth()->user();
        

        $user->remember_token = null;
        $user->save();
        
        auth()->logout();
        session()->invalidate();
        session()->regenerateToken();
        
        return redirect()->route('home');
    }
    
    public function render()
    {
        return view('livewire.home-signout');
    }
}
