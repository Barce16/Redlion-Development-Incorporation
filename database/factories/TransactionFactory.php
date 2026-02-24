<?php

namespace Database\Factories;

use App\Models\Transaction;
use App\Models\Customer;
use App\Models\PropertyListing;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $propertyType = $this->faker->randomElement(['House', 'Apartment', 'Villa']);

        return [
            'customer_id' => Customer::factory(),
            'property_id' => PropertyListing::factory(),
            'invoice_id' => '#' . strtoupper($this->faker->unique()->bothify('??##??##')),
            'property_type' => $propertyType,
            'amount' => $this->faker->randomFloat(2, 50000, 2000000),
            'payment_method' => $this->faker->randomElement(['credit_card', 'debit_card', 'bank_transfer', 'paypal']),
            'payment_card' => $this->faker->randomElement(['visa', 'mastercard', 'paypal']),
            'status' => $this->faker->randomElement(['pending', 'completed', 'paid', 'cancelled']),
            'transaction_date' => $this->faker->dateTimeBetween('-6 months'),
            'notes' => $this->faker->optional()->sentence(),
        ];
    }
}
