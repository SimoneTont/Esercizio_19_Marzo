<?php

namespace Database\Factories;

use App\Models\Timing;
use App\Models\GymCourse;
use Illuminate\Database\Eloquent\Factories\Factory;

class TimingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Timing::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_id' => GymCourse::factory(),
            'beginning' => $this->faker->time(),
            'end' => $this->faker->time(),
        ];
    }
}
