<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timezone extends Model
{
    protected $table = 'timezones';
    protected $fillable =[
        'name_ar',
        'name_en',
        'utc_offset'

    ];
    public function doctor()
    {
        return $this->hasOne(Doctor::class);
    }
    public function patient()
    {
        return $this->hasOne(Patient::class);
    }
    use HasFactory;
}
