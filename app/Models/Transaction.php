<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'property_id',
        'invoice_id',        // foreign key to invoices table
        'invoice_code',      // legacy string code
        'property_type',
        'amount',
        'amount_paid',
        'remaining_balance',
        'payment_type',
        'gcash_reference',
        'sender_name',
        'card_type',
        'card_last4',
        'auth_code',
        'terminal_info',
        'status',
        'transaction_date',
        'or_number',
        'attachment_path',
        'recorded_by',
        'notes',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'transaction_date' => 'date',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }

    public function recordedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'recorded_by');
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(PropertyListing::class, 'property_id');
    }
}
