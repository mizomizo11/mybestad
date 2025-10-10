<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsageConditionsModel extends Model
{
    protected $table = 'usage_conditions';
    protected $fillable =[
        'name',
        'name_eng',
        'details',
        'details_eng',
    ];
    use HasFactory;
}
