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
        // extend the enum to include "inquire" so we can store initial inquiry status
        Schema::table('customers', function (Blueprint $table) {
            $table->enum('status', ['inquire', 'active', 'inactive'])->default('active')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // roll back to the original enum definitions (removing "inquire").
        Schema::table('customers', function (Blueprint $table) {
            $table->enum('status', ['active', 'inactive'])->default('active')->change();
        });
    }
};
