<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefundPolicy extends Model
{
    protected $table = 'refund_policy';
    protected $fillable =[
        'details_ar',
        'details_en',
    ];
    use HasFactory;
}
