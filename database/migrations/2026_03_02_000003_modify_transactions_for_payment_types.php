<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            // make invoice_code nullable before renaming
            if (Schema::hasColumn('transactions', 'invoice_id')) {
                $table->change();  // pragma to allow changes
                $table->string('invoice_id')->nullable()->change();
            }
        });

        Schema::table('transactions', function (Blueprint $table) {
            // rename invoice_id string to invoice_code and make it nullable
            $table->renameColumn('invoice_id', 'invoice_code');
        });

        Schema::table('transactions', function (Blueprint $table) {
            // add foreign key to invoices table
            $table->foreignId('invoice_id')->nullable()->after('property_id')->constrained('invoices')->nullOnDelete();

            // replace payment method/card with a single payment_type
            $table->enum('payment_type', ['cash', 'gcash', 'card'])->default('cash')->after('amount');
            // remove old columns (if they exist)
            if (Schema::hasColumn('transactions', 'payment_method')) {
                $table->dropColumn('payment_method');
            }
            if (Schema::hasColumn('transactions', 'payment_card')) {
                $table->dropColumn('payment_card');
            }

            // new fields to support conditional data
            $table->string('gcash_reference')->nullable();
            $table->string('sender_name')->nullable();
            $table->string('card_type')->nullable();
            $table->string('card_last4', 4)->nullable();
            $table->string('auth_code')->nullable();
            $table->string('terminal_info')->nullable();

            // new amounts and receipts
            $table->decimal('amount_paid', 15, 2)->nullable()->after('amount');
            $table->decimal('remaining_balance', 15, 2)->nullable();
            $table->string('or_number')->nullable();
            $table->string('attachment_path')->nullable();
            $table->foreignId('recorded_by')->nullable()->constrained('users')->nullOnDelete();

            // adjust status options
            $table->enum('status', ['pending', 'completed', 'failed', 'refunded', 'cancelled'])->default('pending')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            // revert status
            $table->enum('status', ['pending', 'completed', 'paid', 'cancelled'])->default('pending')->change();

            // drop added columns
            $table->dropColumn([
                'invoice_id','payment_type','gcash_reference','sender_name',
                'card_type','card_last4','auth_code','terminal_info',
                'amount_paid','remaining_balance','or_number','attachment_path','recorded_by'
            ]);

            // restore old columns
            $table->enum('payment_method', ['credit_card', 'debit_card', 'bank_transfer', 'paypal', 'check'])->default('credit_card');
            $table->enum('payment_card', ['visa', 'mastercard', 'paypal', 'bank_transfer'])->default('visa');

            // rename invoice_code back
            $table->renameColumn('invoice_code', 'invoice_id');
        });
    }
};
