<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyModel extends Model
{
    protected $table = 'companies';
    protected $fillable =[
        'name',
        'name_eng',
        'details',
        'details_eng',
        'pic',
        'record_order',
    ];
    use HasFactory;
}
