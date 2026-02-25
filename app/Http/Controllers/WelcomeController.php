<?php

namespace App\Http\Controllers;

use App\Models\PropertyListing;
use Illuminate\View\View;

class WelcomeController extends Controller
{
    public function index(): View
    {
        // Fetch properties grouped by city with count
        $locationStats = PropertyListing::selectRaw('city, COUNT(*) as count')
            ->whereNotNull('city')
            ->groupBy('city')
            ->orderByDesc('count')
            ->get();

        // Get featured properties (top 3 by views) with images
        $featuredProperties = PropertyListing::with('images')
            ->orderByDesc('views')
            ->limit(3)
            ->get();

        // Get premium developments (highest price properties with images)
        $premiumDevelopments = PropertyListing::with('images')
            ->where('status', 'active')
            ->orderByDesc('price')
            ->limit(4)
            ->get();

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
