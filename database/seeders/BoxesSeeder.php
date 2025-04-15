<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BoxesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('boxes')->insert([
            [
                'box_name' => 'القضية المدنية A-2025',
                'box_number' => 101,
                'shelf_id' => 1,
            ],
            [
                'box_name' => 'القضية المدنية B-2025',
                'box_number' => 102,
                'shelf_id' => 1,
            ],
            [
                'box_name' => 'القضية الجنائية C-2025',
                'box_number' => 103,
                'shelf_id' => 3,
            ],
            [
                'box_name' => 'القضية الجنائية D-2025',
                'box_number' => 104,
                'shelf_id' => 3,
            ],
            [
                'box_name' => 'القضية الدستورية E-2025',
                'box_number' => 105,
                'shelf_id' => 5,
            ],
            [
                'box_name' => 'القضية الدستورية F-2025',
                'box_number' => 106,
                'shelf_id' => 5,
            ],
            [
                'box_name' => 'القضية الإدارية G-2025',
                'box_number' => 107,
                'shelf_id' => 6,
            ],
            [
                'box_name' => 'القضية الإدارية H-2025',
                'box_number' => 108,
                'shelf_id' => 6,
            ],
            [
                'box_name' => 'القضية الأسرية I-2025',
                'box_number' => 109,
                'shelf_id' => 4,
            ],
            [
                'box_name' => 'القضية الأسرية J-2025',
                'box_number' => 110,
                'shelf_id' => 4,
            ]
        ]);
    }
}
