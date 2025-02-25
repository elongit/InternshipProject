<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\Attributes\Validate;

class SignUp extends Component
{
    #[Validate('required|string|max:25')]
    public $first_name;

    #[Validate('required|string|max:25')]
    public $last_name;
    
    #[Validate('required|email|unique:users,email')]
    public $email;

    #[Validate('required|min:6')]
    public $password;

    #[Validate('required|same:password')]
    public $password_confirmation;

    

    public function render()
    {
        if(Auth::check()){
            return abort('404');
        }
        return view('livewire.sign-up');
    }

    public function store(){
        $this->validate();

        $user = User::create([
            'first_name' => $this->first_name,
            'last_name' =>  $this->last_name,
            'email' =>  $this->email,
            'password' =>  Hash::make($this->password),
        ]);


             // bring the role and always assign new users with User role
             $role = \App\Models\Roles::where('role_name', 'User')->first();

             $user->roles()->attach($role->id);
 
             Auth::login($user);
 
             $dashboard = $user->hasRole('Admin') ? '/documents' : '/request';
             return redirect($dashboard)->with('success', 'مرحباً ' . ucfirst($user->first_name));
        

    }
}
