<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CourseYear>
 */
class CourseYearFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'course_year' => $this->faker->numberBetween(1, 6),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
        ];
    }
}
