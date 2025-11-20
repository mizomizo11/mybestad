<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $fillable =[
        'name',
        'categories_id',
        'details',
        'pic',
        'price',
        'is_available',
        'special_products',
        'most_ordered'
    ];

    use HasFactory;
}
