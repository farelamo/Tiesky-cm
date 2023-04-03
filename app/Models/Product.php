<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'short_desc', 'desc', 'photo', 'brand_id', 'category_id'];

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    public function brands()
    {
        return $this->belongsTo(Brand::class);
    }
}