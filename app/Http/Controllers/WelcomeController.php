<?php

namespace App\Http\Controllers;

use App\Models\PropertyListing;
use App\Models\WelcomeImage;
use Illuminate\View\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Carbon;

class WelcomeController extends Controller
{
    /**
     * Check if image should be displayed (published and not scheduled for future).
     */
    private function isImagePublished(WelcomeImage $image): bool
    {
        if (!$image->is_published) {
            return false;
        }
        if ($image->scheduled_publish_at && $image->scheduled_publish_at->isFuture()) {
            return false;
        }
        return true;
    }

    public function index(): View
    {
        // Fetch properties grouped by city with count
        $locationStats = PropertyListing::selectRaw('city, COUNT(*) as count')
            ->whereNotNull('city')
            ->groupBy('city')
            ->orderByDesc('count')
            ->get();

        // attempt to load hero/featured/premium from welcome_images table if it exists
        $heroImages = collect();
        $heroRecord = null;
        if (Schema::hasTable('welcome_images')) {
            // Get all hero images, filtering by publish status
            $heroImages = WelcomeImage::where('type', 'hero')
                ->orderBy('created_at')
                ->get()
                ->filter(fn($img) => $this->isImagePublished($img));

            // If no published images, use any hero image (for development/testing)
            if ($heroImages->isEmpty()) {
                $heroImages = WelcomeImage::where('type', 'hero')
                    ->orderByDesc('created_at')
                    ->get();
            }

            $heroRecord = $heroImages->first();
            \Log::info('WelcomeController: Hero images loaded', [
                'total_count' => $heroImages->count(),
                'hero_record' => $heroRecord ? [
                    'id' => $heroRecord->id,
                    'type' => $heroRecord->type,
                    'image_path' => $heroRecord->image_path,
                    'is_published' => $heroRecord->is_published,
                    'scheduled_publish_at' => $heroRecord->scheduled_publish_at,
                ] : null,
            ]);
        }

        $heroProperty = null;
        if ($heroImages->isNotEmpty() && $heroImages->first()->property) {
            $heroProperty = $heroImages->first()->property;
        }

        // for featured/premium sections load welcome image records when available
        $featuredImages = collect();
        $premiumImages = collect();
        if (Schema::hasTable('welcome_images')) {
            $featuredImages = WelcomeImage::where('type', 'featured')
                ->orderBy('sort_order')
                ->get()
                ->filter(fn($img) => $this->isImagePublished($img))
                ->values();
            $premiumImages = WelcomeImage::where('type', 'premium')
                ->orderBy('sort_order')
                ->get()
                ->filter(fn($img) => $this->isImagePublished($img))
                ->values();
        }

        // original logic for properties (used if there are no welcome images)
        $featuredProperties = PropertyListing::with('images')
            ->where('status', 'active')
            ->where(function ($query) {
                $query->whereRaw("JSON_CONTAINS(extra_flags, '\"featured\"') = 1")
                    ->orWhereNull('extra_flags');
            })
            ->orderByDesc('views')
            ->limit(3)
            ->get()
            ->filter(function ($prop) {
                $flags = json_decode($prop->extra_flags ?? '[]', true) ?? [];
                return in_array('featured', $flags);
            })
            ->values();

        $premiumDevelopments = PropertyListing::with('images')
            ->where('status', 'active')
            ->where(function ($query) {
                $query->whereRaw("JSON_CONTAINS(extra_flags, '\"premium\"') = 1")
                    ->orWhereNull('extra_flags');
            })
            ->orderByDesc('price')
            ->limit(4)
            ->get()
            ->filter(function ($prop) {
                $flags = json_decode($prop->extra_flags ?? '[]', true) ?? [];
                return in_array('premium', $flags);
            })
            ->values();

        // If not enough featured properties, fall back to top by views
        if ($featuredProperties->count() < 3) {
            $existingIds = $featuredProperties->pluck('id')->toArray();
            $additionalFeatured = PropertyListing::with('images')
                ->where('status', 'active')
                ->whereNotIn('id', $existingIds)
                ->orderByDesc('views')
                ->limit(3 - $featuredProperties->count())
                ->get();
            $featuredProperties = $featuredProperties->merge($additionalFeatured);
        }

        // If not enough premium properties, fall back to highest price
        if ($premiumDevelopments->count() < 4) {
            $existingIds = $premiumDevelopments->pluck('id')->toArray();
            $additionalPremium = PropertyListing::with('images')
                ->where('status', 'active')
                ->whereNotIn('id', $existingIds)
                ->orderByDesc('price')
                ->limit(4 - $premiumDevelopments->count())
                ->get();
            $premiumDevelopments = $premiumDevelopments->merge($additionalPremium);
        }

        // original hero fallback (only if no welcome hero record with property)
        if (!$heroProperty) {
            $heroProperty = PropertyListing::whereNotNull('hero_image')
                ->where('status', 'active')
                ->orderByDesc('views')
                ->first();
        }

        // Prepare locations array with first property image from each city
        $locations = $locationStats->map(function ($stat) {
            $propertyInCity = PropertyListing::where('city', $stat->city)
                ->with('images')
                ->whereHas('images')
                ->first();

            $imageUrl = '/images/default.jpg';
            if ($propertyInCity && $propertyInCity->images->isNotEmpty()) {
                $imageUrl = '/storage/' . $propertyInCity->images->first()->image_path;
            }

            return [
                'city' => $stat->city,
                'count' => $stat->count . '+',
                'img' => $imageUrl,
            ];
        })->take(6);

        return view('welcome', [
            'locations' => $locations,
            'featuredProperties' => $featuredProperties,
            'premiumDevelopments' => $premiumDevelopments,
            'heroProperty' => $heroProperty,
            'heroRecord' => $heroRecord,
            'heroImages' => $heroImages,
            'featuredImages' => $featuredImages,
            'premiumImages' => $premiumImages,
        ]);
    }

    public function premiumDevelopments(): View
    {
        // Get premium developments (highest price properties with images)
        $premiumDevelopments = PropertyListing::with('images')
            ->orderByDesc('price')
            ->limit(12)
            ->get();

        return view('premium-developments', [
            'premiumDevelopments' => $premiumDevelopments,
        ]);
    }
}
