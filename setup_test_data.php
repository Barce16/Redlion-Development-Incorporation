<?php
require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Customer;
use App\Models\PropertyListing;
use App\Models\Invoice;

echo "=== Checking Existing Data ===\n";
$customerCount = Customer::count();
$propertyCount = PropertyListing::count();
echo "Customers: $customerCount\n";
echo "Properties: $propertyCount\n";

// Get first customer and properties
$customer = Customer::first();
$properties = PropertyListing::take(3)->get();

if (!$customer || $properties->isEmpty()) {
    echo "\n❌ Not enough data to create invoices. Need at least 1 customer and 1 property.\n";
    exit(1);
}

echo "\n=== Creating Sample Invoices ===\n";

// Create 3 sample invoices
$invoices = [
    [
        'code' => 'INV-2026-001',
        'customer_id' => 1,
        'property_id' => $properties[0]->id,
        'amount_due' => 50000.00,
        'due_date' => now()->addDays(15)->toDateString(),
        'status' => 'open'
    ],
    [
        'code' => 'INV-2026-002',
        'customer_id' => 1,
        'property_id' => $properties[0]->id,
        'amount_due' => 75000.00,
        'due_date' => now()->addDays(30)->toDateString(),
        'status' => 'open'
    ],
    [
        'code' => 'INV-2026-003',
        'customer_id' => 2,
        'property_id' => $properties[0]->id,
        'amount_due' => 35000.00,
        'due_date' => now()->addDays(10)->toDateString(),
        'status' => 'open'
    ]
];

foreach ($invoices as $invoiceData) {
    $invoice = Invoice::create($invoiceData);
    echo "✓ Created: {$invoice->code} - ₱" . number_format($invoice->amount_due, 2) . "\n";
}

echo "\n=== Summary ===\n";
echo "Total Invoices: " . Invoice::count() . "\n";
echo "\n✓ Sample invoices created successfully!\n";
echo "Now you can:\n";
echo "  1. Go to Transactions > Create\n";
echo "  2. Select Customer#1\n";
echo "  3. Select an invoice from dropdown\n";
echo "  4. Test different payment types (Cash, GCash, Card)\n";
echo "  5. Upload a test receipt/screenshot\n";
echo "  6. Verify remaining_balance calculation\n";
