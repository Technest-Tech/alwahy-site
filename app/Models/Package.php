<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_en',
        'name_ar',
        'description_en',
        'description_ar',
        'price',
        'original_price',
        'discount_percentage',
        'sessions_per_week',
        'sessions_count',
        'icon',
        'badge',
        'package_type',
    ];

    public function registrations(): HasMany
    {
        return $this->hasMany(Registration::class);
    }
}

