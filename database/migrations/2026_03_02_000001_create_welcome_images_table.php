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
        Schema::create('welcome_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->nullable()->constrained('property_listings')->onDelete('cascade');
            $table->string('type', 32)->index(); // hero, featured, premium
            $table->string('image_path');
            $table->text('caption')->nullable();
            $table->json('meta')->nullable();
            $table->integer('sort_order')->default(0)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('welcome_images');
    }
};
