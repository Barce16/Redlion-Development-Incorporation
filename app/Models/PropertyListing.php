<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PropertyListing extends Model
{
    use HasFactory;

    protected $table = 'property_listings';

    protected $fillable = [
        'title',
        'description',
        'type',
        'category',
        'price',
        'discount_price',
        'discount_type',
        'stock',
        'total_floors',
        'total_rooms',
        'area',
        'country',
        'city',
        'zone',
        'street_address',
        'facilities',
        'views',
        'inquiries',
        'sales',
        'status',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'discount_price' => 'decimal:2',
        'area' => 'decimal:2',
        'facilities' => 'json',
    ];

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'property_id');
    }
}
