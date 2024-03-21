<?php

namespace Database\Seeders;

use App\Models\GymCourse;
use App\Models\User;
use App\Models\Timing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $courses = GymCourse::factory()->count(20)->create();
        User::factory()->count(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => 'IFOAadmin',
            'isAdmin' => true
        ]);

        User::factory()->create([
            'name' => 'TestUser',
            'email' => 'user@example.com',
            'password' => 'testuser',
            'isAdmin' => false
        ]);
        
        $courses->each(function ($course) {
            Timing::factory()->count(5)->create([
                'course_id' => $course->id,
            ]);
        });
    }
}
