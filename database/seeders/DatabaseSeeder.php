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
        // wipe all data except admin user
        // disable foreign key checks to safely remove data (works with multiple drivers)
        \Schema::disableForeignKeyConstraints();

        Message::truncate();
        Transaction::truncate();
        Customer::truncate();
        PropertyListing::truncate();

        \Schema::enableForeignKeyConstraints();
        // keep only admin user
        User::where('email', '!=', 'admin@example.com')->delete();

        // ensure admin user exists
        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'Admin', 'password' => bcrypt('password')]
        );

        // Optionally seed minimal data for demonstration
        // create a default customer and a sample property so the admin
        // can exercise transactions/messages without manually adding them
        Customer::firstOrCreate(
            ['email' => 'customer@example.com'],
            ['name' => 'John Doe', 'phone' => '09171234567']
        );

        PropertyListing::firstOrCreate(
            ['title' => 'Demo Lot'],
            [
                'price' => 1000000,
                'category' => 'residential',
                'status' => 'published',
                'completion_percentage' => 100,
            ]
        );
    }
}
