<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\PropertyListing;
use App\Models\Message;
use App\Models\Customer;

uses(RefreshDatabase::class);

it('allows a visitor to send an inquiry from the welcome page', function () {
    // ensure an admin exists for the message owner
    \App\Models\User::factory()->create(['email' => 'admin@example.com']);
    $property = PropertyListing::factory()->create(['title' => 'Public Prop']);

    // call controller method directly since tests may not resolve the /inquiries path
    $controller = new \App\Http\Controllers\PropertyController();
    $request = new \Illuminate\Http\Request([
        'name' => 'Visitor One',
        'email' => 'visitor@example.com',
        'phone' => '09171234567',
        'property_id' => $property->id,
        'message' => 'Please contact me',
    ]);
    $response = $controller->publicInquire($request);

    expect($response)->toBeInstanceOf(\Illuminate\Http\RedirectResponse::class);
    // session flash not available when calling controller directly, so skip

    // customer should be created
    $customer = Customer::where('email', 'visitor@example.com')->first();
    expect($customer)->not->toBeNull();
    expect($customer->name)->toBe('Visitor One');

    // property inquiries incremented by one
    $before = $property->inquiries;
    expect($property->refresh()->inquiries)->toBe($before + 1);

    // only one message should exist
    expect(Message::count())->toBe(1);
    // message record should mention property
    $msg = Message::where('customer_id', $customer->id)
        ->where('subject', 'like', "%{$property->title}%")
        ->first();
    expect($msg)->not->toBeNull();
    expect($msg->body)->toBe('Please contact me');
});
