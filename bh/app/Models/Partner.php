<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $table = 'partners';
    protected $fillable =[
        'name_ar',
        'name_en',
        'url',
        'image',
        'record_order',
    ];
    use HasFactory;
}
