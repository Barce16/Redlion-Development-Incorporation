<?php

use Illuminate\Support\Facades\Route;

// simple sanity check that important routes exist

it('has basic application routes registered', function () {
    $routes = Route::getRoutes();
    expect($routes->count())->toBeGreaterThan(0);

    // ensure our inquiry route is available
    $inquiry = collect($routes->getRoutes())->first(fn($r) => $r->getName() === 'properties.inquire');
    expect($inquiry)->not->toBeNull();
});
