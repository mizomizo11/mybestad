<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class PortfolioCategory extends Model
{
    protected $table = 'portfolios_categories';
    protected $fillable =[
        'name_ar',
        'name_en',
        'details_ar',
        'details_en',
        'image',
        'html',
        'style',
        'slug_ar',
        'slug_en',
        'record_order',
    ];
    use HasFactory;
    public function portfolios()
    {
        return $this->hasMany(Portfolio::class,'portfolios_categories_id');
    }
}
