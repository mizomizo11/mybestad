<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';
    protected $fillable =[
//        'link',
        'video_ar',
        'video_en',
        'details_ar',
        'details_en',
        'video2_ar',
        'video2_en',
        'details2_ar',
        'details2_en',
    ];
    use HasFactory;
}
