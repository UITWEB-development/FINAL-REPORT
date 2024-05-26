<?php

namespace App\Livewire;


use Livewire\Component;

class Signout extends Component
{   
    public function signout() {
        $user = auth()->user();
        $user_type = $user->role->name; 

        $user->remember_token = null;
        $user->save();
        
        auth()->logout();
        session()->invalidate();
        session()->regenerateToken();
        
        return redirect()->route('signin', ['user_type' => $user_type]);
    }
    public function render()
    {
        return view('livewire.signout');
    }
}
