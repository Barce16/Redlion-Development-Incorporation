<?php

namespace App\Http\Controllers;

use App\Models\PropertyListing;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PropertyController extends Controller
{
    public function index(): View
    {
        $properties = PropertyListing::paginate(12);
        $stats = [
            'total' => PropertyListing::count(),
            'published' => PropertyListing::where('status', 'published')->count(),
            'draft' => PropertyListing::where('status', 'draft')->count(),
            'sold' => PropertyListing::where('status', 'sold')->count(),
        ];

        return view('properties.index', [
            'properties' => $properties,
            'stats' => $stats,
        ]);
    }

    public function create(): View
    {
        return view('properties.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:house,apartment,villa,commercial,land',
            'category' => 'required|in:residential,commercial,industrial,other',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'discount_type' => 'nullable|in:fixed,percentage',
            'stock' => 'required|integer|min:1',
            'total_floors' => 'nullable|integer|min:0',
            'total_rooms' => 'nullable|integer|min:0',
            'area' => 'nullable|numeric|min:0',
            'country' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'zone' => 'nullable|string|max:255',
            'street_address' => 'nullable|string',
            'facilities' => 'nullable|json',
            'status' => 'required|in:draft,published,sold,archived',
        ]);

        PropertyListing::create($validated);

        return redirect()->route('properties.index')->with('success', 'Property created successfully.');
    }

    public function show(PropertyListing $property): View
    {
        return view('properties.show', ['property' => $property]);
    }

    public function edit(PropertyListing $property): View
    {
        return view('properties.edit', ['property' => $property]);
    }

    public function update(Request $request, PropertyListing $property): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'string|max:255',
            'description' => 'nullable|string',
            'type' => 'in:house,apartment,villa,commercial,land',
            'category' => 'in:residential,commercial,industrial,other',
            'price' => 'numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'discount_type' => 'nullable|in:fixed,percentage',
            'stock' => 'integer|min:1',
            'total_floors' => 'nullable|integer|min:0',
            'total_rooms' => 'nullable|integer|min:0',
            'area' => 'nullable|numeric|min:0',
            'country' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'zone' => 'nullable|string|max:255',
            'street_address' => 'nullable|string',
            'facilities' => 'nullable|json',
            'status' => 'in:draft,published,sold,archived',
        ]);

        $property->update($validated);

        return redirect()->route('properties.show', $property)->with('success', 'Property updated successfully.');
    }

    public function destroy(PropertyListing $property): RedirectResponse
    {
        $property->delete();
        return redirect()->route('properties.index')->with('success', 'Property deleted successfully.');
    }

    public function incrementViews(PropertyListing $property): RedirectResponse
    {
        $property->increment('views');
        return back();
    }

    public function incrementInquiries(PropertyListing $property): RedirectResponse
    {
        $property->increment('inquiries');
        return back();
    }
}
