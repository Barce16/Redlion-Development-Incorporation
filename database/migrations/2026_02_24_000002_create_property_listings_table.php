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
        Schema::create('property_listings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('type', ['house', 'apartment', 'villa', 'commercial', 'land'])->default('house');
            $table->enum('category', ['residential', 'commercial', 'industrial', 'other'])->default('residential');
            $table->decimal('price', 15, 2);
            $table->decimal('discount_price', 15, 2)->nullable();
            $table->enum('discount_type', ['fixed', 'percentage'])->nullable();
            $table->integer('stock')->default(1);
            $table->integer('total_floors')->nullable();
            $table->integer('total_rooms')->nullable();
            $table->decimal('area', 10, 2)->nullable(); // in sqft
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('zone')->nullable();
            $table->text('street_address')->nullable();
            $table->text('facilities')->nullable(); // JSON format
            $table->integer('views')->default(0);
            $table->integer('inquiries')->default(0);
            $table->integer('sales')->default(0);
            $table->enum('status', ['draft', 'published', 'sold', 'archived'])->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_listings');
    }
};
