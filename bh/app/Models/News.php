<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $fillable =[
        'name_ar',
        'name_en',
        'slug_ar',
        'slug_en',
        'summary_ar',
        'summary_en',
        'keywords_ar',
        'keywords_en',
        'details_ar',
        'details_en',
        'image',
        'record_order',
    ];
    use HasFactory;
}
