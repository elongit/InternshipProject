<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create(){
        if (Auth::check()) {
            return redirect()->route('/'); 
        }
        return view('auth.login');
    }


    public function store(Request $request){

        //validate

        $attributes = $request->validate([
            'email' => 'required|email',
            'password'=> 'required'
        ]);

       // attempt login user
        if (!Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'Invalidcredentials' => ['بيانات الاعتماد المقدمة غير صحيحة'],
         ]);
        }
        // re genrate the session
        $request->session()->regenerate();
        $user = Auth::user();
       
        $dashboard = $user->hasRole('Admin') ? '/documents' : '/request';
        return redirect($dashboard)->with('success', 'مرحبا' . ucfirst($user->first_name));
    }
        

    public function destroy(){
        Auth::logout();
        return redirect()->route('/');
    }

}
