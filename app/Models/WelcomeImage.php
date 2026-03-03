<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WelcomeImage extends Model
{
    protected $table = 'welcome_images';

    protected $fillable = [
        'property_id',
        'property_listing_id',
        'type', // hero | featured | premium
        'image_path',
        'caption',
        'alt_text',
        'meta',
        'tags',
        'sort_order',
        'is_published',
        'scheduled_publish_at',
        'view_count',
        'click_count',
    ];

    protected $casts = [
        'meta' => 'json',
        'tags' => 'json',
        'sort_order' => 'integer',
        'is_published' => 'boolean',
        'scheduled_publish_at' => 'datetime',
        'view_count' => 'integer',
        'click_count' => 'integer',
    ];

    public function property(): BelongsTo
    {
        return $this->belongsTo(PropertyListing::class, 'property_id');
    }

    public function propertyListing(): BelongsTo
    {
        return $this->belongsTo(PropertyListing::class, 'property_listing_id');
    }
}
