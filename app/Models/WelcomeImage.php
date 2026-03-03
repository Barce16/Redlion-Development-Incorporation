<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WelcomeImage extends Model
{
    protected $table = 'welcome_images';

    protected $fillable = [
        'property_id',
        'type', // hero | featured | premium
        'image_path',
        'caption',
        'meta',
        'sort_order',
        'is_published',
        'scheduled_publish_at',
    ];

    protected $casts = [
        'meta' => 'json',
        'sort_order' => 'integer',
        'is_published' => 'boolean',
        'scheduled_publish_at' => 'datetime',
    ];

    public function property(): BelongsTo
    {
        return $this->belongsTo(PropertyListing::class, 'property_id');
    }
}
