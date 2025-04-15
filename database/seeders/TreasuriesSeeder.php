<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class TreasuriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Create an instance of Faker
        $faker = Faker::create();
        
        DB::table('treasuries')->insert([
            [
                'treasury_name' => 'قسم الاستئناف المدني',
                'treasury_number' => 1001,
                'treasury_location' => 'محكمة الاستئناف، الطابق الأول، الغرفة 101',
            ],
            [
                'treasury_name' => 'قسم الاستئناف الجنائي',
                'treasury_number' => 1002,
                'treasury_location' => 'محكمة الاستئناف، الطابق الثاني، الغرفة 201',
            ],
            [
                'treasury_name' => 'المحكمة الدستورية',
                'treasury_number' => 1003,
                'treasury_location' => 'محكمة الاستئناف، الطابق الثالث، الغرفة 305',
            ],
            [
                'treasury_name' => 'القسم الإداري',
                'treasury_number' => 1004,
                'treasury_location' => 'محكمة الاستئناف، الطابق الرابع، الغرفة 404',
            ],
            [
                'treasury_name' => 'قسم محكمة الأسرة',
                'treasury_number' => 1005,
                'treasury_location' => 'محكمة الاستئناف، الطابق الخامس، الغرفة 505',
            ]
        ]);

    }
}
