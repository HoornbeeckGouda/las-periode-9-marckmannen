<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password = 'student123';

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    private static $usedNumbers = [];

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'student_id' => $this->getUniqueNumber(1, 30),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
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
