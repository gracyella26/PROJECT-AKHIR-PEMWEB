<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['user_name', 'product_id', 'comment', 'likes', 'dislikes'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
