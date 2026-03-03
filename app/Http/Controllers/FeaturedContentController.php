<?php

namespace App\Http\Controllers;

use App\Models\WelcomeImage;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Schema;

class FeaturedContentController extends Controller
{
    /**
     * Display management dashboard for featured content
     */
    public function index(Request $request): View
    {
        // provide existing welcome images so the UI can list/edit them
        $heroImages = collect();
        $featuredImages = collect();
        $premiumImages = collect();

        // Get search and filter parameters
        $search = $request->get('search', '');
        $filterType = $request->get('filter_type', 'all');
        $filterStatus = $request->get('filter_status', 'all');

        if (Schema::hasTable('welcome_images')) {
            // Base query with filters
            $heroQuery = WelcomeImage::where('type', 'hero')->orderBy('sort_order');
            $featuredQuery = WelcomeImage::where('type', 'featured')->orderBy('sort_order');
            $premiumQuery = WelcomeImage::where('type', 'premium')->orderBy('sort_order');

            // Apply search across all types
            if ($search) {
                $heroQuery->where(function($q) use ($search) {
                    $q->where('caption', 'like', "%{$search}%")
                      ->orWhere('alt_text', 'like', "%{$search}%")
                      ->orWhereJsonContains('meta->location', $search);
                });
                $featuredQuery->where(function($q) use ($search) {
                    $q->where('caption', 'like', "%{$search}%")
                      ->orWhere('alt_text', 'like', "%{$search}%")
                      ->orWhereJsonContains('meta->location', $search);
                });
                $premiumQuery->where(function($q) use ($search) {
                    $q->where('caption', 'like', "%{$search}%")
                      ->orWhere('alt_text', 'like', "%{$search}%")
                      ->orWhereJsonContains('meta->location', $search);
                });
            }

            // Apply status filter
            if ($filterStatus !== 'all') {
                $isPublished = $filterStatus === 'published';
                $heroQuery->where('is_published', $isPublished);
                $featuredQuery->where('is_published', $isPublished);
                $premiumQuery->where('is_published', $isPublished);
            }

            $heroImages = $heroQuery->get();
            $featuredImages = $featuredQuery->get();
            $premiumImages = $premiumQuery->get();
        }

        // Calculate dashboard stats
        $stats = [
            'total_images' => ($heroImages->count() + $featuredImages->count() + $premiumImages->count()),
            'hero' => ['total' => $heroImages->count(), 'published' => $heroImages->where('is_published', true)->count(), 'draft' => $heroImages->where('is_published', false)->count()],
            'featured' => ['total' => $featuredImages->count(), 'published' => $featuredImages->where('is_published', true)->count(), 'draft' => $featuredImages->where('is_published', false)->count()],
            'premium' => ['total' => $premiumImages->count(), 'published' => $premiumImages->where('is_published', true)->count(), 'draft' => $premiumImages->where('is_published', false)->count()],
            'total_views' => WelcomeImage::sum('view_count') ?? 0,
            'total_clicks' => WelcomeImage::sum('click_count') ?? 0,
        ];

        return view('featured.index', [
            'heroImages' => $heroImages,
            'featuredImages' => $featuredImages,
            'premiumImages' => $premiumImages,
            'stats' => $stats,
            'search' => $search,
            'filterType' => $filterType,
            'filterStatus' => $filterStatus,
        ]);
    }


}
