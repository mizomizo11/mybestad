<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    protected $fillable =[
        'name_ar',
        'name_en',
        'summary_ar',
        'summary_en' ,
        'details_ar',
        'details_en',
        'image',
        'record_order',
    ];
    use HasFactory;
}
