<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'slug', 'description', 'price', 'stock', 'category', 'image',
        'weight', 'skin_type', 'texture', 'scent', 'color',
        'rating', 'rating_count', 'review_count'
    ];

     public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
