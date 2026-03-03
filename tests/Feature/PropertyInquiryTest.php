<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\PropertyListing;
use App\Models\Customer;
use App\Models\User;
use App\Models\Message;

uses(RefreshDatabase::class);

it('allows admin to record an inquiry and creates a message', function () {
    // prepare admin user, property and customer
    $admin = User::factory()->create([
        'email' => 'admin@example.com',
        'email_verified_at' => now(),
    ]);
    $property = PropertyListing::factory()->create(['title' => 'Sample Property']);
    $customer = Customer::factory()->create();

    // sanity check: the property should exist in the database
    $this->assertNotNull(\App\Models\PropertyListing::find($property->id));

    // call controller method directly to avoid sqlite in-memory connection
    $controller = new \App\Http\Controllers\PropertyController();
    $request = new \Illuminate\Http\Request([
        'customer_id' => $customer->id,
        'message' => 'Is this still available?'
    ]);
    // simulate the authenticated user
    \Auth::login($admin);

    $before = $property->inquiries;
    $response = $controller->inquire($request, $property);

    // controller returns a RedirectResponse
    expect($response)->toBeInstanceOf(\Illuminate\Http\RedirectResponse::class);

    // property inquiries incremented by one
    expect($property->refresh()->inquiries)->toBe($before + 1);

    // message record exists (message table doesn't store property_id)
    $msg = Message::where('customer_id', $customer->id)
        ->where('subject', 'like', "%{$property->title}%")
        ->first();

    expect($msg)->not->toBeNull();
    expect($msg->body)->toBe('Is this still available?');
    expect($msg->subject)->toContain('Inquiry');
});
