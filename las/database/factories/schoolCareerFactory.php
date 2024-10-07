<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\schoolCareer>
 */
class schoolCareerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    private static $usedNumbers = [];
    
    public function definition(): array
    {
        return [
            'course_year_id' => $this->faker->numberBetween(1, 5),
            'course_id' => $this->faker->numberBetween(1, 10),
            'group_id' => $this->faker->numberBetween(1, 10),
            'student_id' => $this->getUniqueNumber(1, 30),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
        ];
    }
    private function getUniqueNumber($min, $max)
    {
        do {
            $number = $this->faker->numberBetween($min, $max);
        } while (in_array($number, self::$usedNumbers));

        self::$usedNumbers[] = $number;

        return $number;
    }
}
