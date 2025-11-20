<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivacyPolicyModel extends Model
{
    protected $table = 'privacy_policy';
    protected $fillable =[
        'name',
        'name_eng',
        'details',
        'details_eng',

    ];
    use HasFactory;
}
