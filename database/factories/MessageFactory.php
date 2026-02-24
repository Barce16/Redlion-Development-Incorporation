<?php

namespace Database\Factories;

use App\Models\Message;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $subjects = [
            'Inquiry about Property #2847',
            'Question about Payment Terms',
            'Confirmed Viewing Appointment',
            'Purchase Agreement Signature',
            'Rental Property Inquiry',
            'Move-in Schedule Confirmed',
            'Follow-up on Property Details',
            'Financing Options Available',
            'Property Inspection Report',
            'Early Possession Request',
        ];

        return [
            'customer_id' => Customer::factory(),
            'user_id' => User::factory(),
            'subject' => $this->faker->randomElement($subjects),
            'body' => $this->faker->paragraphs(3, true),
            'reply' => $this->faker->optional()->paragraphs(2, true),
            'status' => $this->faker->randomElement(['unread', 'read', 'answered', 'archived']),
            'read_at' => $this->faker->optional()->dateTime(),
            'replied_at' => $this->faker->optional()->dateTime(),
        ];
    }
}
