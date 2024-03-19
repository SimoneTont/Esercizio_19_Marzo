<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GymCourse;

class GymCoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GymCourse::factory()->count(10)->create();
    }
}

