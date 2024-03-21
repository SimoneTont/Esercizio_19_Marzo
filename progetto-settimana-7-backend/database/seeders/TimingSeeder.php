<?php

namespace Database\Seeders;

use App\Models\Timing;
use Illuminate\Database\Seeder;

class TimingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Timing::factory()->count(10)->create();
    }
}
