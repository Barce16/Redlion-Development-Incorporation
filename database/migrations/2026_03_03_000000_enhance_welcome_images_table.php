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
        if (Schema::hasTable('welcome_images')) {
            Schema::table('welcome_images', function (Blueprint $table) {
                // Add alt_text for SEO/accessibility if it doesn't exist
                if (!Schema::hasColumn('welcome_images', 'alt_text')) {
                    $table->string('alt_text')->nullable()->after('caption');
                }

                // Add property_listing_id for linking to actual properties
                if (!Schema::hasColumn('welcome_images', 'property_listing_id')) {
                    $table->foreignId('property_listing_id')->nullable()->after('property_id')->constrained('property_listings')->nullOnDelete();
                }

                // Add view_count for analytics
                if (!Schema::hasColumn('welcome_images', 'view_count')) {
                    $table->integer('view_count')->default(0)->after('scheduled_publish_at');
                }

                // Add click_count for analytics
                if (!Schema::hasColumn('welcome_images', 'click_count')) {
                    $table->integer('click_count')->default(0)->after('view_count');
                }

                // Add tags for organization
                if (!Schema::hasColumn('welcome_images', 'tags')) {
                    $table->json('tags')->nullable()->after('meta');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('welcome_images')) {
            Schema::table('welcome_images', function (Blueprint $table) {
                if (Schema::hasColumn('welcome_images', 'alt_text')) {
                    $table->dropColumn('alt_text');
                }
                if (Schema::hasColumn('welcome_images', 'property_listing_id')) {
                    $table->dropForeignIdFor('property_listings');
                    $table->dropColumn('property_listing_id');
                }
                if (Schema::hasColumn('welcome_images', 'view_count')) {
                    $table->dropColumn('view_count');
                }
                if (Schema::hasColumn('welcome_images', 'click_count')) {
                    $table->dropColumn('click_count');
                }
                if (Schema::hasColumn('welcome_images', 'tags')) {
                    $table->dropColumn('tags');
                }
            });
        }
    }
};
