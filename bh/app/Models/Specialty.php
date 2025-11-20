<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    protected $table = 'specialties';
    protected $fillable =[
        'name_ar',
        'name_en',
        'price',
        'details_ar',
        'details_en',
        'image',
        'record_order',
    ];
    use HasFactory;

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
}
