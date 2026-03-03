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
            'alt_text' => 'nullable|string|max:255',
            'property_listing_id' => 'nullable|exists:property_listings,id',
            'tags' => 'nullable|array',
            'tags.*' => 'nullable|string|max:50',
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
                'alt_text' => $validated['alt_text'] ?? null,
                'property_listing_id' => $validated['property_listing_id'] ?? null,
                'tags' => $validated['tags'] ?? null,
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
        // log incoming data for easier debugging of edit issues
        \Log::info('WelcomeImageController::update called', ['id' => $welcomeImage->id, 'request' => $request->all()]);

        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'caption' => 'nullable|string|max:255',
            'alt_text' => 'nullable|string|max:255',
            'property_listing_id' => 'nullable|exists:property_listings,id',
            'tags' => 'nullable|array',
            'tags.*' => 'nullable|string|max:50',
            'is_published' => 'nullable|in:true,false,1,0',  // Accept both string and numeric boolean
            'scheduled_publish_at' => 'nullable|date_format:Y-m-d H:i',
            'meta' => 'nullable|array',
            'meta.*' => 'nullable|string|max:255',
        ]);

        // Normalize boolean field
        if (array_key_exists('is_published', $validated)) {
            $validated['is_published'] = filter_var($validated['is_published'], FILTER_VALIDATE_BOOLEAN);
        }

        // replace file if new one provided
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($welcomeImage->image_path);
            $path = $request->file('image')->store('welcome/' . $welcomeImage->type, 'public');
            $welcomeImage->image_path = $path;
        }

        // update simple scalar attributes
        if (array_key_exists('caption', $validated)) {
            $welcomeImage->caption = $validated['caption'];
        }
        if (array_key_exists('alt_text', $validated)) {
            $welcomeImage->alt_text = $validated['alt_text'];
        }
        if (array_key_exists('property_listing_id', $validated)) {
            $welcomeImage->property_listing_id = $validated['property_listing_id'];
        }
        if (array_key_exists('is_published', $validated)) {
            $welcomeImage->is_published = (bool) $validated['is_published'];
        }
        if (array_key_exists('scheduled_publish_at', $validated)) {
            $welcomeImage->scheduled_publish_at = $validated['scheduled_publish_at']
                ? Carbon::createFromFormat('Y-m-d H:i', $validated['scheduled_publish_at'])
                : null;
        }
        if (array_key_exists('tags', $validated)) {
            $welcomeImage->tags = $validated['tags'] ?: null;
        }

        // merge meta rather than replacing entirely to avoid losing unedited fields
        if (array_key_exists('meta', $validated)) {
            $existing = $welcomeImage->meta ?? [];
            foreach ($validated['meta'] as $key => $value) {
                if ($value === null || $value === '') {
                    unset($existing[$key]);
                } else {
                    $existing[$key] = $value;
                }
            }
            $welcomeImage->meta = $existing ?: null;
        }

        $welcomeImage->save();

        \Log::info('WelcomeImageController::update completed', ['id' => $welcomeImage->id, 'model'=> $welcomeImage->toArray()]);

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

    /**
     * Bulk publish images
     */
    public function bulkPublish(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'integer|exists:welcome_images,id',
        ]);

        WelcomeImage::whereIn('id', $validated['ids'])->update(['is_published' => true]);

        return response()->json(['success' => true, 'message' => 'Images published']);
    }

    /**
     * Bulk unpublish images
     */
    public function bulkUnpublish(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'integer|exists:welcome_images,id',
        ]);

        WelcomeImage::whereIn('id', $validated['ids'])->update(['is_published' => false]);

        return response()->json(['success' => true, 'message' => 'Images unpublished']);
    }

    /**
     * Bulk delete images
     */
    public function bulkDelete(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'integer|exists:welcome_images,id',
        ]);

        $images = WelcomeImage::whereIn('id', $validated['ids'])->get();

        foreach ($images as $image) {
            Storage::disk('public')->delete($image->image_path);
            $image->delete();
        }

        return response()->json(['success' => true, 'message' => count($images) . ' images deleted']);
    }
}
