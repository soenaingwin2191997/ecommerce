<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'item_id',
        'product_name',
        'product_image',
        'normal_price',
        'discount_price',
        'des1',
        'des2',
        'des3',
        'des4',
        'des5',
        'des6',
        'long_des',
        'view_count',
        'order_count',
    ];
}
