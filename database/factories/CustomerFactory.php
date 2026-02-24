<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'address' => $this->faker->address(),
            'total_transactions' => $this->faker->numberBetween(1, 20),
            'total_spent' => $this->faker->randomFloat(2, 50000, 500000),
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'joined_at' => $this->faker->dateTimeBetween('-2 years'),
        ];
    }
}
