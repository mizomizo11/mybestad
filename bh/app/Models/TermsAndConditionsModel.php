<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermsAndConditionsModel extends Model
{
    protected $table = 'terms_conditions';
    protected $fillable =[
        'details',
        'details_eng',

    ];
    use HasFactory;
}
