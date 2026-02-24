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
        'province',
        'zone',
        'street_address',
        'facilities',
        'views',
        'inquiries',
        'sales',
        'status',

        // Premium Fields
        'project_name',
        'developer_company',
        'completion_percentage',
        'total_investment',
        'price_per_sqm',
        'reservation_fee',
        'payment_terms',
        'brochure_file',
        'floor_plan_pdf',
        'site_plan_pdf',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'discount_price' => 'decimal:2',
        'area' => 'decimal:2',
        'total_investment' => 'decimal:2',
        'price_per_sqm' => 'decimal:2',
        'reservation_fee' => 'decimal:2',
        'facilities' => 'json',
    ];

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'property_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProjectImage::class, 'property_id');
    }
}
