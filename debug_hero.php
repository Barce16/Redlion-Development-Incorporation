<?php
require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(\Illuminate\Contracts\Http\Kernel::class);
$app->make(\Illuminate\Contracts\Debug\ExceptionHandler::class)->register();

$app->booting(function() {
    // App is booting
});

$app->boot();

// Check database
$images = \App\Models\WelcomeImage::where('type', 'hero')->get();
echo "Found " . $images->count() . " hero images\n";

foreach ($images as $img) {
    echo "ID: {$img->id}, Path: {$img->image_path}, Published: {$img->is_published}, Schedule: {$img->scheduled_publish_at}\n";
    $fullPath = public_path('storage/' . $img->image_path);
    echo "  Full path: $fullPath\n";
    echo "  File exists: " . (file_exists($fullPath) ? 'YES' : 'NO') . "\n";
}
