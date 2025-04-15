<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AddUser extends Controller
{
    public function create(){
        return view('admin.users.addUser');
    }

    public function store(Request $request)
    {
            $request->validate([
                'first_name' => 'required|string|max:50',
                'last_name' => 'required|string|max:50',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|confirmed',
            ]);



            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' =>  $request->last_name,
                'email' =>  $request->email,
                'password' =>  Hash::make($request->password),
            ]);
            
            $role = Roles::where('role_name', 'User')->first();

            $user->roles()->attach($role->id);


            return redirect()->route('users')->with('success', 'تمت إضافة المستخدم بنجاح');


        
      
    }
}
