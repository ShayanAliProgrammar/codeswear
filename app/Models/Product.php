<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'main_image',
        'price',
        'product_images',
        'colors',
        'sizes',
        'designs',
        'product_details',
        "category_id"
    ];
}
