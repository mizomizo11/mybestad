<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'customer_id',
        'delivery_address',
        'state',
        'total_price',
        'details',
        'payment_method',


    ];
    use HasFactory;
}
