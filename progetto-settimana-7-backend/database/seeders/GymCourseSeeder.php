<?php

namespace Database\Seeders;

use App\Models\GymCourse;
use Illuminate\Database\Seeder;

class GymCourseSeeder extends Seeder
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
