<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreModel extends Model
{
    protected $table = 'stores';
    protected $fillable =[
        'categories_id',
        'name',
        'name_eng',
        'address',
        'address_eng',
        'pic',
        'record_order',
        'login_name',
        'pass',
        'monday_open',
        'monday_close',
        'tuesday_open',
        'tuesday_close',
        'wednesday_open',
        'wednesday_close',
        'thursday_open',
        'thursday_close',
        'friday_open',
        'friday_close',
        'saturday_open',
        'saturday_close',
        'sunday_open',
        'sunday_close'
    ];

    use HasFactory;
}
