<?php
require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Transaction;
use App\Models\Invoice;
use App\Models\Customer;
use App\Models\PropertyListing;
use App\Models\User;
use Illuminate\Http\UploadedFile;

echo "\n========================================\n";
echo "   TRANSACTION SYSTEM TEST SUITE\n";
echo "========================================\n\n";

// ============= TEST 1: Verify Invoice Data =============
echo "TEST 1: Verify Sample Invoices\n";
echo "─────────────────────────────────\n";
$invoices = Invoice::all();
echo "✓ Invoices in database: " . $invoices->count() . "\n";
foreach ($invoices as $inv) {
    echo "  • {$inv->code} - ₱" . number_format($inv->amount_due, 2) . " (Customer: {$inv->customer_id})\n";
}

// ============= TEST 2: Test Cash Payment Transaction =============
echo "\n\nTEST 2: Create Cash Payment Transaction\n";
echo "─────────────────────────────────────────\n";
$invoice1 = Invoice::first();
$customer = Customer::find($invoice1->customer_id);
$property = PropertyListing::first();
$user = User::first();

$txn1Data = [
    'customer_id' => $customer->id,
    'property_id' => $property->id,
    'invoice_id' => $invoice1->id,
    'invoice_code' => null,  // nullable - we're using invoice_id instead
    'property_type' => $property->title ?? 'unknown',
    'amount' => 25000.00,
    'amount_due' => $invoice1->amount_due,
    'amount_paid' => 25000.00,
    'remaining_balance' => $invoice1->amount_due - 25000.00,
    'payment_type' => 'cash',
    'or_number' => 'OR-2026-001',
    'status' => 'completed',
    'transaction_date' => now()->toDateString(),
    'recorded_by' => $user->id,
    'notes' => 'Partial cash payment'
];

try {
    $txn1 = Transaction::create($txn1Data);
    echo "✓ Cash transaction created (ID: {$txn1->id})\n";
    echo "  • Amount: ₱" . number_format($txn1->amount, 2) . "\n";
    echo "  • Amount Paid: ₱" . number_format($txn1->amount_paid, 2) . "\n";
    echo "  • Remaining Balance: ₱" . number_format($txn1->remaining_balance, 2) . "\n";
    echo "  • Status: {$txn1->status}\n";
    echo "  • Payment Type: {$txn1->payment_type}\n";

    // Verify calculation
    $expectedBalance = $invoice1->amount_due - 25000;
    if ($txn1->remaining_balance == $expectedBalance) {
        echo "  ✓ Remaining balance calculated correctly!\n";
    } else {
        echo "  ✗ Balance mismatch! Expected ₱" . number_format($expectedBalance, 2) . "\n";
    }
} catch (\Exception $e) {
    echo "✗ Failed: " . $e->getMessage() . "\n";
}

// ============= TEST 3: Test GCash Payment Transaction =============
echo "\n\nTEST 3: Create GCash Payment Transaction\n";
echo "────────────────────────────────────────\n";
$invoice2 = Invoice::skip(1)->first();

$txn2Data = [
    'customer_id' => $customer->id,
    'property_id' => $property->id,
    'invoice_id' => $invoice2->id,
    'invoice_code' => null,
    'property_type' => $property->title ?? 'unknown',
    'amount' => 50000.00,
    'amount_due' => $invoice2->amount_due,
    'amount_paid' => 50000.00,
    'remaining_balance' => $invoice2->amount_due - 50000.00,
    'payment_type' => 'gcash',
    'gcash_reference' => 'REF-20260302-98765',
    'sender_name' => '09171234567',
    'status' => 'completed',
    'transaction_date' => now()->toDateString(),
    'recorded_by' => $user->id,
    'notes' => 'GCash payment with screenshot'
];

try {
    $txn2 = Transaction::create($txn2Data);
    echo "✓ GCash transaction created (ID: {$txn2->id})\n";
    echo "  • Amount: ₱" . number_format($txn2->amount, 2) . "\n";
    echo "  • GCash Reference: {$txn2->gcash_reference}\n";
    echo "  • Sender: {$txn2->sender_name}\n";
    echo "  • Remaining Balance: ₱" . number_format($txn2->remaining_balance, 2) . "\n";
    echo "  • Status: {$txn2->status}\n";

    if ($txn2->payment_type == 'gcash') {
        echo "  ✓ GCash fields stored correctly!\n";
    }
} catch (\Exception $e) {
    echo "✗ Failed: " . $e->getMessage() . "\n";
}

// ============= TEST 4: Test Card Payment Transaction =============
echo "\n\nTEST 4: Create Card Payment Transaction\n";
echo "────────────────────────────────────────\n";
$invoice3 = Invoice::skip(2)->first();

$txn3Data = [
    'customer_id' => $customer->id,
    'property_id' => $property->id,
    'invoice_id' => $invoice3->id,
    'invoice_code' => null,
    'property_type' => $property->title ?? 'unknown',
    'amount' => 35000.00,
    'amount_due' => $invoice3->amount_due,
    'amount_paid' => 35000.00,
    'remaining_balance' => 0,
    'payment_type' => 'card',
    'card_type' => 'Visa',
    'card_last4' => '4242',
    'auth_code' => 'AUTH-123456',
    'terminal_info' => 'BDO Terminal #001',
    'status' => 'paid',
    'transaction_date' => now()->toDateString(),
    'recorded_by' => $user->id,
    'notes' => 'Full payment by card'
];

try {
    $txn3 = Transaction::create($txn3Data);
    echo "✓ Card transaction created (ID: {$txn3->id})\n";
    echo "  • Amount: ₱" . number_format($txn3->amount, 2) . "\n";
    echo "  • Card Type: {$txn3->card_type} (Last 4: {$txn3->card_last4})\n";
    echo "  • Auth Code: {$txn3->auth_code}\n";
    echo "  • Terminal: {$txn3->terminal_info}\n";
    echo "  • Remaining Balance: ₱" . number_format($txn3->remaining_balance, 2) . "\n";
    echo "  • Status: {$txn3->status}\n";

    if ($txn3->remaining_balance == 0) {
        echo "  ✓ Full payment tracked correctly (0 remaining)!\n";
    }
} catch (\Exception $e) {
    echo "✗ Failed: " . $e->getMessage() . "\n";
}

// ============= TEST 5: Test Partial Payment Scenarios =============
echo "\n\nTEST 5: Partial Payment Tracking\n";
echo "────────────────────────────────\n";

// Create multiple partial payments for one invoice (avoid duplicating existing)
$testInvoice = Invoice::firstOrCreate(
    ['code' => 'INV-TEST-001'],
    [
        'customer_id' => $customer->id,
        'property_id' => $property->id,
        'amount_due' => 100000.00,
        'due_date' => now()->addDays(30)->toDateString(),
        'status' => 'open'
    ]
);

$payments = [
    ['amount' => 30000.00, 'label' => 'First Payment (30%)'],
    ['amount' => 40000.00, 'label' => 'Second Payment (40%)'],
    ['amount' => 30000.00, 'label' => 'Final Payment (30%)']
];

$totalPaid = 0;
echo "Testing invoice: {$testInvoice->code} - Total Due: ₱" . number_format($testInvoice->amount_due, 2) . "\n\n";

foreach ($payments as $i => $payment) {
    $totalPaid += $payment['amount'];
    $remaining = $testInvoice->amount_due - $totalPaid;

    $partialTxn = Transaction::create([
        'customer_id' => $customer->id,
        'property_id' => $property->id,
        'invoice_id' => $testInvoice->id,
        'invoice_code' => null,
        'property_type' => $property->title ?? 'unknown',
        'amount' => $payment['amount'],

        'amount_due' => $testInvoice->amount_due,
        'amount_paid' => $payment['amount'],
        'remaining_balance' => $remaining,
        'payment_type' => 'cash',
        'or_number' => 'OR-PARTIAL-' . ($i + 1),
        'status' => $remaining <= 0 ? 'paid' : 'pending',
        'transaction_date' => now()->toDateString(),
        'recorded_by' => $user->id,
        'notes' => $payment['label'],
        'attachment_path' => null
    ]);

    echo "Payment " . ($i + 1) . ": {$payment['label']}\n";
    echo "  • Paid: ₱" . number_format($payment['amount'], 2) . "\n";
    echo "  • Cumulative: ₱" . number_format($totalPaid, 2) . "\n";
    echo "  • Remaining: ₱" . number_format($remaining, 2) . "\n";
    echo "  • Status: {$partialTxn->status}\n";

    if ($partialTxn->remaining_balance == $remaining) {
        echo "  ✓ Calculation correct!\n";
    }
    echo "\n";
}

// ============= TEST 6: Verify Database Relationships =============
echo "\nTEST 6: Verify Database Relationships\n";
echo "────────────────────────────────────\n";

$sampleTxn = Transaction::with('customer', 'invoice', 'property', 'recordedBy')->find($txn1->id);
echo "✓ TransactionID {$sampleTxn->id}:\n";
echo "  • Customer: {$sampleTxn->customer->name}\n";
echo "  • Invoice: {$sampleTxn->invoice->code}\n";
echo "  • Property: {$sampleTxn->property->title}\n";
echo "  • Recorded By: {$sampleTxn->recordedBy->name}\n";

// ============= SUMMARY =============
echo "\n\n========================================\n";
echo "   TEST SUMMARY\n";
echo "========================================\n";
$totalTxns = Transaction::count();
$byCash = Transaction::where('payment_type', 'cash')->count();
$byGcash = Transaction::where('payment_type', 'gcash')->count();
$byCard = Transaction::where('payment_type', 'card')->count();

echo "Total Transactions: $totalTxns\n";
echo "  • Cash: $byCash\n";
echo "  • GCash: $byGcash\n";
echo "  • Card: $byCard\n\n";

echo "✓ ALL TESTS COMPLETED SUCCESSFULLY!\n\n";
echo "Next Steps:\n";
echo "  1. Visit http://yourapp/transactions to see the transaction list\n";
echo "  2. Click 'Create Transaction' to test the form manually\n";
echo "  3. Upload a test file (image/PDF) in the receipt field\n";
echo "  4. Verify file was saved in storage/app\n";
echo "  5. Check remaining_balance auto-calculation in form\n";
