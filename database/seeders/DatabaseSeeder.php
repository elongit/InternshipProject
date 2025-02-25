<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserRoles;
use App\Models\Roles;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
            // Create a new user (if needed)
       
        $user = \App\Models\User::find(1);
        // // Create a new role (if needed)
        $role = \App\Models\Roles::create([
            'role_name' => 'user',
        ]);

        // User::create([
        //     'first_name' => 'oussama',
        //     'last_name' => 'douwabi',
        //     'email' => 'oussama@gmail.com',
        //     'password' => Hash::make('password'),
        // ]);

        // Attach the 'Admin' role to the user
        $user->roles()->attach($role->id);
        
    
    }
}
