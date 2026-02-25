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
        Schema::table('property_listings', function (Blueprint $table) {
            // Basic Information
            $table->string('project_name')->nullable()->after('title');
            $table->string('developer_company')->nullable()->after('project_name');
            $table->string('province')->nullable()->after('city');
            $table->string('completion_percentage')->default(0)->after('status');

            // Financial Details
            $table->decimal('total_investment', 18, 2)->nullable()->after('completion_percentage');
            $table->decimal('price_per_sqm', 18, 2)->nullable()->after('total_investment');
            $table->decimal('reservation_fee', 18, 2)->nullable()->after('price_per_sqm');
            $table->string('payment_terms')->nullable()->after('reservation_fee'); // Installment / Bank Financing

            // File Uploads
            $table->string('brochure_file')->nullable()->after('payment_terms');
            $table->string('floor_plan_pdf')->nullable()->after('brochure_file');
            $table->string('site_plan_pdf')->nullable()->after('floor_plan_pdf');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('property_listings', function (Blueprint $table) {
            $table->dropColumn([
                'project_name',
                'developer_company',
                'province',
                'completion_percentage',
                'total_investment',
                'price_per_sqm',
                'reservation_fee',
                'payment_terms',
                'brochure_file',
                'floor_plan_pdf',
                'site_plan_pdf',
            ]);
        });
    }
};
