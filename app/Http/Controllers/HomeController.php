<?php

namespace App\Http\Controllers;

use App\Models\PropertyListing;

class HomeController extends Controller
{
    public function index()
    {
        // Your DB has no "is_featured" column, so we pick “featured” by popularity.
        // You can change ordering to sales, inquiries, created_at, etc.
        // eagerly load images to avoid N+1 queries
        $featuredProperties = PropertyListing::with('images')
            ->select(
                'id', 'title', 'project_name', 'type', 'category', 'developer_company',
                'completion_percentage', 'price', 'city', 'area', 'total_rooms', 'total_floors',
                'views', 'sales', 'status'
            )
            ->whereIn('status', ['published', 'active']) // adjust if your status values differ
            ->orderByDesc('views')
            ->orderByDesc('sales')
            ->limit(12)
            ->get();

        return view('home', compact('featuredProperties'));
    }
}
