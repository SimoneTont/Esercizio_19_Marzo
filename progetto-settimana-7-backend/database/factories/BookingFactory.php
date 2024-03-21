<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\GymCourse;
use App\Models\Timing;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Booking::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => function () {
                return User::factory()->create()->id;
            },
            'course_id' => function () {
                return GymCourse::factory()->create()->id;
            },
            'timing_id' => function () {
                return Timing::factory()->create()->id;
            },
            'booked' => $this->faker->boolean,
            'pending' => $this->faker->boolean,
        ];
    }
}
