<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermsConditions extends Model
{
    protected $table = 'terms_conditions';
    protected $fillable =[
        'details_ar',
        'details_en',

    ];
    use HasFactory;
}
