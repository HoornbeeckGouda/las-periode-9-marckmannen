<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'middle_name' => $this->faker->lastName,
            'initials' => $this->faker->regexify('[A-Z]{1}'),
            'full_name' => $this->faker->name,
            'zipcode' => $this->faker->postcode,
            'street' => $this->faker->streetName,
            'house_number' => $this->faker->buildingNumber,
            'city' => $this->faker->city,
        ];
    }
}
