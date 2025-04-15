<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DivisionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a Faker instance
        $faker = Faker::create();

        DB::table('divisions')->insert([
            [
                'division_name' => 'شعبة المحاضر',
                'division_location' => $faker->address
            ],
            [
                'division_name' => 'شعبة التحقيق ',
                'division_location' => $faker->address
            ],
            [
                'division_name' => 'شعبة الوفيات ',
                'division_location' => $faker->address
            ],
            [
                'division_name' => 'الجنايات الاستنافية ',
                'division_location' => $faker->address
            ],
            [
                'division_name' => ' الجنايات ابتدائية ',
                'division_location' => $faker->address
            ],
            [
                'division_name' => ' التدبير الاداري ',
                'division_location' => $faker->address
            ],
            [
                'division_name' => ' شعبة المراسلات  ',
                'division_location' => $faker->address
            ],
        ]);
    }
}
