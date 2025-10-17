<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientCategory extends Model
{
    protected $table = 'clients_categories';
    protected $fillable =[
        'name_ar',
        'name_en',
        'details_ar',
        'details_en',
        'image',
        'record_order',
    ];
    use HasFactory;
    public function portfolios()
    {
        return $this->hasMany(Client::class,'clients_categories_id');
    }
}
