<?php

namespace App\Livewire;

use Livewire\Component;
use App\Mail\ContactEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class Contact extends Component
{
    public function render()
    {
        return view('livewire.contact')
            ->layout('components.layouts.aboutus');
    }
    public function sendEmail(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'textarea' => 'required|string|max:5000',
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $textarea = $request->input('textarea');

        //Mail::to(env('MAIL_SYSTEM'))->send(new ContactEmail($name, $email, $textarea));
        Mail::send(new ContactEmail($name, $email, $textarea));
        return redirect()->route('contact')->with('success', 'Your email has been sent successfully!');
    }
}


