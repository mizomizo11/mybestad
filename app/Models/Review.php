<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'rating',
        'comment',
        'approved'
    ];

    protected $casts = [
        'approved' => 'boolean',
        'rating' => 'integer'
    ];
}
