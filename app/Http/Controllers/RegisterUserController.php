<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Database\QueryException;

class RegisterUserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth::check()){
            return abort('404');
        }
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
            $request->validate([
                'first_name' => 'required|string|max:50',
                'last_name' => 'required|string|max:50',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|confirmed',
            ]);

    
            // Create the user and login immediately
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' =>  $request->last_name,
                'email' =>  $request->email,
                'password' =>  Hash::make($request->password),
            ]);
            
            // bring the role and always assign new users with User role
            $role = \App\Models\Roles::where('role_name', 'User')->first();

            $user->roles()->attach($role->id);

            Auth::login($user);

            $dashboard = $user->hasRole('Admin') ? '/documents' : '/request';
            return redirect($dashboard)->with('success', 'مرحباً ' . ucfirst($user->first_name));

           

      
    }
}
