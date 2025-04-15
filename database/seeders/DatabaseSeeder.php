<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            TreasuriesSeeder::class,
            ShelvesSeeder::class,
            BoxesSeeder::class,
       ]);

        // Optionally, you can output a message indicating success
        $this->command->info("Admin user with 'Admin' role created successfully!");
    }
}
