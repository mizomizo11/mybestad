<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $table = 'settings';
    protected $fillable =[
        'logo_ar',
        'logo_en',
        'primary_color',
//        'price1',
//        'price2',
    ];
    use HasFactory;
}
