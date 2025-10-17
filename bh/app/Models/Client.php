<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
//    protected $table = 'portfolios';
    protected $fillable =[
        'clients_categories_id',
        'name_ar',
        'name_en',
        'country_ar',
        'country_en',
        'customer_ar',
        'customer_en',
        'details_ar',
        'details_en',
        'image',
        'year',
        'record_order',
    ];
    use HasFactory;
    public function cats()
    {
        return $this->belongsTo(ClientCategory::class,'clients_categories_id');
    }
}
