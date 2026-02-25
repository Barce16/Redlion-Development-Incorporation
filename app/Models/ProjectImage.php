<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectImage extends Model
{
    use HasFactory;

    protected $table = 'project_images';

    protected $fillable = [
        'property_id',
        'image_path',
        'image_type',
        'caption',
        'sort_order',
    ];

    public function property(): BelongsTo
    {
        return $this->belongsTo(PropertyListing::class, 'property_id');
    }
}
