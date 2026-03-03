<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Message;
use App\Models\Customer;
use App\Models\User;

uses(RefreshDatabase::class);

it('shows inquiries on messages page', function () {
    $admin = User::factory()->create([
        'email' => 'admin@example.com',
        'email_verified_at' => now(),
    ]);

    $cust = Customer::factory()->create();
    Message::create([
        'customer_id' => $cust->id,
        'user_id' => $admin->id,
        'subject' => 'Test inquiry',
        'body' => 'Hello',
        'status' => 'unread',
    ]);

    // hit controller directly to avoid prefix routing issues
    \Auth::login($admin);
    $controller = new \App\Http\Controllers\MessageController();
    $response = $controller->index();

    expect($response)->toBeInstanceOf(\Illuminate\View\View::class);
    $rendered = $response->render();
    expect($rendered)->toContain('Test inquiry');
    expect($rendered)->toContain('Hello');
});
