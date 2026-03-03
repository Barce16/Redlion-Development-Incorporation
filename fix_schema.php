<?php
require_once 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

echo "Fixing invoice_code column to be nullable...\n";
DB::statement("ALTER TABLE transactions MODIFY invoice_code VARCHAR(255) NULL DEFAULT NULL");
echo "✓ Done!\n";
