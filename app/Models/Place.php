<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Place extends Model
{
    /** @use HasFactory<\Database\Factories\PlaceFactory> */
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'city', 'state'
    ];

    protected static function booted()
    {
        static::saving(function ($place) {
            if (!empty($place->name)) {
                $place->slug = \Str::slug($place->name);
            }
        });
    }
}
