<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;

class Login extends Component
{
    #[Validate('required|email')]
    public $email = '';
    #[Validate('required|min:8')]
    public $password = ''; 
    public function render()
    {
        if (Auth::check()) {
            return redirect()->route('/'); 
        }
        return view('livewire.login');
    }

    public function store()
    {
        $attributes = $this->validate();
        // attempt login user
        if (!Auth::attempt($attributes)) {
            $this->reset('password'); 
            throw ValidationException::withMessages([
                'Invalidcredentials' => ['بيانات الاعتماد المقدمة غير صحيحة'],
         ]);

        }
        $this->reset(['email' , 'password']);


          // re genrate the session
          session()->regenerate();
          $user = Auth::user();
          $dashboard = $user->hasRole('Admin') ? '/documents' : '/request';
          return redirect($dashboard)->with('success', 'مرحبا' .' ' .ucfirst($user->first_name));
    }
}
