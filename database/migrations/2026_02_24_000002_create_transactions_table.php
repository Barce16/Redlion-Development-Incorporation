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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            $table->foreignId('property_id')->constrained('property_listings')->onDelete('cascade');
            $table->string('invoice_id')->unique();
            $table->string('property_type'); // House, Apartment, Villa, etc.
            $table->decimal('amount', 15, 2);
            $table->enum('payment_method', ['credit_card', 'debit_card', 'bank_transfer', 'paypal', 'check'])->default('credit_card');
            $table->enum('payment_card', ['visa', 'mastercard', 'paypal', 'bank_transfer'])->default('visa');
            $table->enum('status', ['pending', 'completed', 'paid', 'cancelled'])->default('pending');
            $table->date('transaction_date');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
