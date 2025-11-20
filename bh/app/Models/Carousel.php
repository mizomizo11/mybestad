<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    protected $table = 'carousels';
    protected $fillable =[
        'name_ar',
        'name_en',
        'details_ar',
        'details_en',
        'image',
        'record_order',
    ];
    use HasFactory;
}
