<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhousModel extends Model
{
    protected $table = 'whous';
    protected $fillable =[
        'whous',
        'whous_eng',
        'chairman',
        'chairman_eng',
        'vision',
        'vision_eng',
        'mission',
        'mission_eng'

    ];
    use HasFactory;
}
