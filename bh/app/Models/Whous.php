<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Whous extends Model
{
    protected $table = 'whous';
    protected $fillable =[
        'whous_ar',
        'whous_en',
        'chairman_ar',
        'chairman_en',
        'vision_ar',
        'vision_en',
        'mission_ar',
        'mission_en'
    ];
    use HasFactory;
}
