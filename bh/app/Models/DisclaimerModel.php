<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisclaimerModel extends Model
{
    protected $table = 'disclaimer';
    protected $fillable =[
        'details_ar',
        'details_en',


    ];
    use HasFactory;
}
