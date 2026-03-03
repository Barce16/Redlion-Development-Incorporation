<?php

namespace App\Http\Controllers;

use App\Models\WelcomeImage;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;

class WelcomeImageController extends Controller
{
    /**
     * Store a new welcome image (hero/featured/premium) or bulk upload.
     * Supports single or multiple images via 'images' array.
     */
    public function store(Request $request): JsonResponse
    {
        \Log::info('WelcomeImageController::store called', ['request_data' => $request->all()]);

        $validated = $request->validate([
            'type' => 'required|in:hero,featured,premium',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images' => 'nullable|array|max:20',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'caption' => 'nullable|string|max:255',
            'is_published' => 'nullable|in:true,false,1,0',  // Accept string or numeric boolean
            'scheduled_publish_at' => 'nullable|date_format:Y-m-d H:i',
            'meta' => 'nullable|array',
            'meta.*' => 'nullable|string|max:255',
        ]);

        // Normalize boolean field
        $validated['is_published'] = filter_var($validated['is_published'] ?? true, FILTER_VALIDATE_BOOLEAN);

        \Log::info('WelcomeImageController::store validated', ['validated_data' => $validated]);

        $images = [];
        $files = [];

        // Collect single or bulk files
        if ($request->hasFile('image')) {
            $files[] = $request->file('image');
        }
        if ($request->hasFile('images')) {
            $files = array_merge($files, $request->file('images'));
        }

        if (empty($files)) {
            return response()->json(['success' => false, 'message' => 'No files provided'], 400);
        }

        // hero is unique: remove any existing record before inserting new ones
        if ($validated['type'] === 'hero' && count($files) > 0) {
            WelcomeImage::where('type', 'hero')->delete();
        }

        // Get current max sort order
        $maxSort = WelcomeImage::where('type', $validated['type'])->max('sort_order') ?? -1;

        foreach ($files as $file) {
            $maxSort++;
            $path = $file->store('welcome/' . $validated['type'], 'public');

            \Log::info('File stored', ['path' => $path, 'full_path' => public_path('storage/' . $path)]);

            $welcome = WelcomeImage::create([
                'property_id' => null,
                'type' => $validated['type'],
                'image_path' => $path,
                'caption' => $validated['caption'] ?? null,
                'meta' => $validated['meta'] ?? null,
                'sort_order' => $maxSort,
                'is_published' => (bool) ($validated['is_published'] ?? true),
                'scheduled_publish_at' => $validated['scheduled_publish_at'] ?? null,
            ]);

            \Log::info('WelcomeImage created', ['id' => $welcome->id, 'path' => $welcome->image_path, 'published' => $welcome->is_published, 'meta' => $welcome->meta]);

            $images[] = $welcome->id;
        }

        \Log::info('WelcomeImageController::store completed', ['image_ids' => $images, 'count' => count($images)]);

        return response()->json(['success' => true, 'ids' => $images, 'count' => count($images)]);
    }

    /**
     * Update an existing welcome image's caption, file, or publish settings.
     */
    public function update(Request $request, WelcomeImage $welcomeImage): JsonResponse
    {
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'caption' => 'nullable|string|max:255',
            'is_published' => 'nullable|in:true,false,1,0',  // Accept both string and numeric boolean
            'scheduled_publish_at' => 'nullable|date_format:Y-m-d H:i',
            'meta' => 'nullable|array',
            'meta.*' => 'nullable|string|max:255',
        ]);

        // Normalize boolean field
        if (array_key_exists('is_published', $validated)) {
            $validated['is_published'] = filter_var($validated['is_published'], FILTER_VALIDATE_BOOLEAN);
        }

        if ($request->hasFile('image')) {
            // delete old file
            Storage::disk('public')->delete($welcomeImage->image_path);
            $path = $request->file('image')->store('welcome/' . $welcomeImage->type, 'public');
            $welcomeImage->image_path = $path;
        }

        if (array_key_exists('caption', $validated)) {
            $welcomeImage->caption = $validated['caption'];
        }

        if (array_key_exists('meta', $validated)) {
            $welcomeImage->meta = $validated['meta'] ?: null;
        }

        if (array_key_exists('is_published', $validated)) {
            $welcomeImage->is_published = (bool) $validated['is_published'];
        }

        if (array_key_exists('scheduled_publish_at', $validated)) {
            $welcomeImage->scheduled_publish_at = $validated['scheduled_publish_at'] ? Carbon::createFromFormat('Y-m-d H:i', $validated['scheduled_publish_at']) : null;
        }

        $welcomeImage->save();

        return response()->json(['success' => true]);
    }

    /**
     * Remove an image from the welcome page.
     */
    public function destroy(WelcomeImage $welcomeImage): JsonResponse
    {
        Storage::disk('public')->delete($welcomeImage->image_path);
        $welcomeImage->delete();
        return response()->json(['success' => true]);
    }

    /**
     * Bulk reorder images by updating their sort_order.
     */
    public function reorder(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'type' => 'required|in:hero,featured,premium',
            'ids' => 'required|array',
            'ids.*' => 'integer|exists:welcome_images,id',
        ]);

        foreach ($validated['ids'] as $order => $id) {
            WelcomeImage::where('id', $id)
                ->where('type', $validated['type'])
                ->update(['sort_order' => $order]);
        }

        return response()->json(['success' => true]);
    }

    public function move(Request $request, WelcomeImage $welcomeImage): JsonResponse
    {
        $validated = $request->validate([
            'direction' => 'required|in:up,down',
        ]);

        $type = $welcomeImage->type;

        if ($validated['direction'] === 'up') {
            $other = WelcomeImage::where('type', $type)
                ->where('sort_order', '<', $welcomeImage->sort_order)
                ->orderByDesc('sort_order')
                ->first();
        } else {
            $other = WelcomeImage::where('type', $type)
                ->where('sort_order', '>', $welcomeImage->sort_order)
                ->orderBy('sort_order')
                ->first();
        }

        if ($other) {
            $tmp = $welcomeImage->sort_order;
            $welcomeImage->sort_order = $other->sort_order;
            $other->sort_order = $tmp;
            $welcomeImage->save();
            $other->save();
        }

        return response()->json(['success' => true]);
    }
}
