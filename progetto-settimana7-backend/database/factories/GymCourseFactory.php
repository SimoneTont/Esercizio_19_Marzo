<?php

namespace Database\Factories;

use App\Models\GymCourse;
use Illuminate\Database\Eloquent\Factories\Factory;

class GymCourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GymCourse::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_id' => $this->faker->unique()->word,
            'course_name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph,
        ];
    }
}
