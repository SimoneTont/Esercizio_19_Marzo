<?php

namespace Database\Seeders;

use App\Models\GymCourse;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        GymCourse::factory()->count(20)->create();
        User::factory()->count(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Admin',
             'email' => 'admin@example.com',
             'password' => 'IFOAadmin',
             'isAdmin' => true
         ]);

         \App\Models\User::factory()->create([
            'name' => 'TestUser',
            'email' => 'user@example.com',
            'password' => 'testuser',
            'isAdmin' => false
        ]);
    }
}
