<?php

namespace Database\Factories;

use App\Models\PropertyListing;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PropertyListing>
 */
class PropertyListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = $this->faker->randomElement(['house', 'apartment', 'villa', 'commercial']);

        return [
            'title' => $this->faker->catchPhrase() . ' ' . $type,
            'description' => $this->faker->paragraphs(3, true),
            'type' => $type,
            'category' => $this->faker->randomElement(['residential', 'commercial', 'industrial']),
            'price' => $this->faker->randomFloat(2, 100000, 5000000),
            'discount_price' => $this->faker->optional()->randomFloat(2, 80000, 4500000),
            'discount_type' => $this->faker->optional()->randomElement(['fixed', 'percentage']),
            'stock' => $this->faker->numberBetween(1, 10),
            'total_floors' => $this->faker->numberBetween(1, 50),
            'total_rooms' => $this->faker->numberBetween(1, 10),
            'area' => $this->faker->randomFloat(2, 500, 50000),
            'country' => 'Philippines',
            'city' => $this->faker->city(),
            'zone' => $this->faker->word(),
            'street_address' => $this->faker->address(),
            'facilities' => json_encode([
                'swimming_pool' => $this->faker->boolean(),
                'gym' => $this->faker->boolean(),
                'parking' => $this->faker->boolean(),
                'garden' => $this->faker->boolean(),
                'ac' => $this->faker->boolean(),
                'furnished' => $this->faker->boolean(),
            ]),
            'views' => $this->faker->numberBetween(100, 5000),
            'inquiries' => $this->faker->numberBetween(5, 100),
            'sales' => $this->faker->numberBetween(1, 30),
            'status' => $this->faker->randomElement(['published', 'sold', 'archived']),
        ];
    }
}
