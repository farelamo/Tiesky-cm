<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'short_desc', 'desc', 'photo'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }

    public function brands()
    {
        return $this->belongsToMany(Brand::class, 'product_brands');
    }
}