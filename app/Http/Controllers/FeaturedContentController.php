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
    public function index(): View
    {
        // provide existing welcome images so the UI can list/edit them
        $heroImages = collect();
        $featuredImages = collect();
        $premiumImages = collect();

        if (Schema::hasTable('welcome_images')) {
            $heroImages = WelcomeImage::where('type', 'hero')->orderBy('sort_order')->get();
            $featuredImages = WelcomeImage::where('type', 'featured')->orderBy('sort_order')->get();
            $premiumImages = WelcomeImage::where('type', 'premium')->orderBy('sort_order')->get();
        }

        return view('featured.index', [
            'heroImages' => $heroImages,
            'featuredImages' => $featuredImages,
            'premiumImages' => $premiumImages,
        ]);
    }


}
