<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HowWeWork extends Model
{
    protected $table = 'howwework';
    protected $fillable =[
        'link',
        'video',
        'details_ar',
        'details_en',
    ];
    use HasFactory;
}
