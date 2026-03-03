<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Database\Seeders\DatabaseSeeder;
use App\Models\User;

uses(RefreshDatabase::class);

it('retains only the admin user when seeding', function () {
    // create some dummy users
    User::factory()->count(3)->create();

    // ensure more than one user exists
    expect(User::count())->toBeGreaterThan(1);

    // run the seeder which should wipe everything except admin
    $this->seed(DatabaseSeeder::class);

    $users = User::all();
    expect($users->count())->toBe(1);
    expect($users->first()->email)->toBe('admin@example.com');
});
