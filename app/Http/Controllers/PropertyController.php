<?php

namespace App\Http\Controllers;

use App\Models\PropertyListing;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PropertyController extends Controller
{
    public function index(Request $request): View
    {
        $query = PropertyListing::query();

        // Filter by city if provided
        if ($request->has('city') && $request->city) {
            $query->where('city', ucfirst($request->city));
        }

        $properties = $query->paginate(12);
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
            // Basic Information (trimmed to selling essentials)
            'title' => 'required|string|max:255',
            'project_name' => 'nullable|string|max:255',
            'developer_company' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'type' => 'nullable|in:house,apartment,villa,commercial,land',
            'category' => 'required|in:residential,commercial,industrial,other',
            'city' => 'nullable|string|max:255',
            'province' => 'nullable|string|max:255',

            // Financial Details
            'price' => 'required|numeric|min:0',
            'price_per_sqm' => 'nullable|numeric|min:0',
            'reservation_fee' => 'nullable|numeric|min:0',
            'payment_terms' => 'nullable|string|max:255',

            // Status & Completion
            'status' => 'required|in:draft,published,sold,archived',
            'completion_percentage' => 'required|numeric|min:0|max:100',

            // File Uploads
            'brochure_file' => 'nullable|file|mimes:pdf,doc,docx|max:5000',
            'floor_plan_pdf' => 'nullable|file|mimes:pdf|max:5000',
            'site_plan_pdf' => 'nullable|file|mimes:pdf|max:5000',
            'project_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file uploads
        if ($request->hasFile('brochure_file')) {
            $validated['brochure_file'] = $request->file('brochure_file')->store('properties/brochures', 'public');
        }
        if ($request->hasFile('floor_plan_pdf')) {
            $validated['floor_plan_pdf'] = $request->file('floor_plan_pdf')->store('properties/plans', 'public');
        }
        if ($request->hasFile('site_plan_pdf')) {
            $validated['site_plan_pdf'] = $request->file('site_plan_pdf')->store('properties/plans', 'public');
        }

        $property = PropertyListing::create($validated);

        // Handle multiple images
        if ($request->hasFile('project_images')) {
            foreach ($request->file('project_images') as $image) {
                $path = $image->store('properties/images', 'public');
                $property->images()->create([
                    'image_path' => $path,
                    'image_type' => 'render',
                ]);
            }
        }

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
            'project_name' => 'nullable|string|max:255',
            'developer_company' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'category' => 'in:residential,commercial,industrial,other',
            'price' => 'numeric|min:0',
            'city' => 'nullable|string|max:255',
            'province' => 'nullable|string|max:255',
            'status' => 'in:draft,published,sold,archived',
            'completion_percentage' => 'nullable|numeric|min:0|max:100',
            'price_per_sqm' => 'nullable|numeric|min:0',
            'reservation_fee' => 'nullable|numeric|min:0',
            'payment_terms' => 'nullable|string|max:255',
            'brochure_file' => 'nullable|file|mimes:pdf,doc,docx|max:5000',
            'floor_plan_pdf' => 'nullable|file|mimes:pdf|max:5000',
            'site_plan_pdf' => 'nullable|file|mimes:pdf|max:5000',
            'project_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file uploads
        if ($request->hasFile('brochure_file')) {
            $validated['brochure_file'] = $request->file('brochure_file')->store('properties/brochures', 'public');
        }
        if ($request->hasFile('floor_plan_pdf')) {
            $validated['floor_plan_pdf'] = $request->file('floor_plan_pdf')->store('properties/plans', 'public');
        }
        if ($request->hasFile('site_plan_pdf')) {
            $validated['site_plan_pdf'] = $request->file('site_plan_pdf')->store('properties/plans', 'public');
        }

        $property->update($validated);

        // Handle multiple images (append)
        if ($request->hasFile('project_images')) {
            foreach ($request->file('project_images') as $image) {
                $path = $image->store('properties/images', 'public');
                $property->images()->create([
                    'image_path' => $path,
                    'image_type' => 'render',
                ]);
            }
        }

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
