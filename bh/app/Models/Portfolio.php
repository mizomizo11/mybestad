<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable =[
        'portfolios_categories_id',
        'name_ar',
        'name_en',
        'details_ar',
        'details_en',
        'image',
        'record_order',
    ];
    public function cats()
    {
        return $this->belongsTo(PortfolioCategory::class,'portfolios_categories_id');
    }
    use HasFactory;
}
