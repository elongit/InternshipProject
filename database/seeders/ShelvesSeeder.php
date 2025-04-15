<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShelvesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('shelves')->insert([
            [
                'shelf_name' => 'رف 1 ',
                'shelf_number' => 1,
                'shelf_location' => 'محكمة الاستئناف، الطابق الأول، الغرفة 101',
                'treasury_id' => 1,
            ],
            [
                'shelf_name' => 'رف 2 ',
                'shelf_number' => 2,
                'shelf_location' => 'محكمة الاستئناف، الطابق الأول، الغرفة 102',
                'treasury_id' => 1,
            ],
            [
                'shelf_name' => 'رف 3',
                'shelf_number' => 3,
                'shelf_location' => 'محكمة الاستئناف، الطابق الثاني، الغرفة 201',
                'treasury_id' => 2,
            ],
            [
                'shelf_name' => 'رف 4',
                'shelf_number' => 4,
                'shelf_location' => 'محكمة الاستئناف، الطابق الثاني، الغرفة 202',
                'treasury_id' => 2,
            ],
            [
                'shelf_name' => 'رف 5',
                'shelf_number' => 5,
                'shelf_location' => 'محكمة الاستئناف، الطابق الثالث، الغرفة 305',
                'treasury_id' => 3,
            ],
            [
                'shelf_name' => 'رف 6',
                'shelf_number' => 6,
                'shelf_location' => 'محكمة الاستئناف، الطابق الثالث، الغرفة 306',
                'treasury_id' => 3,
            ]
        ]);

    }
}
