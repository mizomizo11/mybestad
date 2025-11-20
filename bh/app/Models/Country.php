<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';
    protected $fillable =[
        'name_ar',
        'name_en',
        'image',
        'record_order',
        ];
    use HasFactory;

    public function doctors()
    {
        return $this->hasOne(Doctor::class);
    }
    public function patients()
    {
        return $this->hasMany(Patient::class);
    }




}
