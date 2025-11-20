<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivacyPolicy extends Model
{
    protected $table = 'privacy_policy';
    protected $fillable =[
        'name_ar',
        'name_en',
        'details_ar',
        'details_en',

    ];
    use HasFactory;
}
