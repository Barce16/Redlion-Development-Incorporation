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

        // Get featured properties (top 3 by views)
        $featuredProperties = PropertyListing::orderByDesc('views')
            ->limit(3)
            ->get();

        // Prepare locations array with images mapped to cities
        $locationImages = [
            'Cagayan de Oro' => '/images/cagayan.jpg',
            'Davao City' => '/images/davao.jpg',
            'General Santos' => '/images/gensan.jpg',
            'Butuan City' => '/images/butuan.jpg',
            'Zamboanga City' => '/images/zamboanga.jpg',
            'Iligan City' => '/images/iligan.jpg',
        ];

        $locations = $locationStats->map(function ($stat) use ($locationImages) {
            return [
                'city' => $stat->city,
                'count' => $stat->count . '+',
                'img' => $locationImages[$stat->city] ?? '/images/default.jpg',
            ];
        })->take(6);

        return view('welcome', [
            'locations' => $locations,
            'featuredProperties' => $featuredProperties,
        ]);
    }
}
