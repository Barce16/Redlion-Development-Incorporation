<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Customer;
use App\Models\PropertyListing;
use App\Models\Transaction;
use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create test user
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Create additional users
        User::factory(3)->create();

        // Create properties
        PropertyListing::factory(20)->create();

        // Create customers
        Customer::factory(50)->create();

        // Create transactions
        Transaction::factory(100)->create();

        // Create messages
        Message::factory(30)->create();
    }
}
