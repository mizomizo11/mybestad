<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsageConditions extends Model
{
    protected $table = 'usage_conditions';
    protected $fillable =[
        'details_ar',
        'details_en',
    ];
    use HasFactory;
}
