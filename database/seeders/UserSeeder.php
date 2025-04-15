<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Roles;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Roles::where('role_name', 'Admin')->first();
        $userRole = Roles::where('role_name', 'User')->first();

        $admin = User::create([
            'first_name' => 'أسامة',
            'last_name' => 'الدوابي',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'),
        ]);
        $admin->roles()->attach($adminRole);

        $user1 = User::create([
            'first_name' => 'فاطمة',
            'last_name' => 'الزهراء العلوي',
            'email' => 'fatima@gmail.com',
            'password' => Hash::make('password123'),
        ]);
        $user1->roles()->attach($userRole);

        $user2 = User::create([
            'first_name' => 'محمود',
            'last_name' => 'التازي',
            'email' => 'mahmoud@gmail.com',
            'password' => Hash::make('password123'),
        ]);
        $user2->roles()->attach($userRole);

        $user3 = User::create([
            'first_name' => 'سارة',
            'last_name' => 'الوفا',
            'email' => 'sara@gmail.com',
            'password' => Hash::make('password123'),
        ]);
        $user3->roles()->attach($userRole);

        $user4 = User::create([
            'first_name' => 'يوسف',
            'last_name' => 'النصارى',
            'email' => 'youssef@gmail.com',
            'password' => Hash::make('password123'),
        ]);
        $user4->roles()->attach($userRole);

        $user5 = User::create([
            'first_name' => 'زهراء',
            'last_name' => 'الحسيني',
            'email' => 'zahra@gmail.com',
            'password' => Hash::make('password123'),
        ]);
        $user5->roles()->attach($userRole);

        $user6 = User::create([
            'first_name' => 'عبد الله',
            'last_name' => 'العثماني',
            'email' => 'abdullah@gmail.com',
            'password' => Hash::make('password123'),
        ]);
        $user6->roles()->attach($userRole);

        $user7 = User::create([
            'first_name' => 'عائشة',
            'last_name' => 'أمزيان',
            'email' => 'aicha@gmail.com',
            'password' => Hash::make('password123'),
        ]);
        $user7->roles()->attach($userRole);

        $user8 = User::create([
            'first_name' => 'كريم',
            'last_name' => 'الطاوسي',
            'email' => 'karim@gmail.com',
            'password' => Hash::make('password123'),
        ]);
        $user8->roles()->attach($userRole);

        $user9 = User::create([
            'first_name' => 'ليلى',
            'last_name' => 'حسني',
            'email' => 'layla@gmail.com',
            'password' => Hash::make('password123'),
        ]);
        $user9->roles()->attach($userRole);

        $user10 = User::create([
            'first_name' => 'محمد',
            'last_name' => 'بن عبد الرحيم',
            'email' => 'mohamed@gmail.com',
            'password' => Hash::make('password123'),
        ]);
        $user10->roles()->attach($userRole);
    }
}
