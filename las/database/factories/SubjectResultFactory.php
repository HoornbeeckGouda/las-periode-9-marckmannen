<?php

namespace Database\Factories;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubjectResults>
 */
class SubjectResultFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    private static $usedNumbers = [];
    
    
    public function definition(): array
    {
        $subjectIds = Subject::pluck('id')->toArray();
        return [
            'school_carreer_id' => $this->getUniqueNumber(1, 10),
            'subject_id' => $this->faker->randomElement($subjectIds),
            'result' => $this->faker->numberBetween(1, 10),
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
