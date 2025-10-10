<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    protected $fillable = [
        'consultation_id',
        'payment_method',
        'payment_value',
        'payment_date',
        'image',
        'accepted',
        'reference',
        'created_at',
        'updated_at',
    ];

//    public static function getPaymentMethods()
//    {
//        return [
//            "cash" => "كاش",
//            "bank" => "بنك او حوالة"
//        ];
//    }

//    public function account()
//    {
//        return $this->belongsTo(AccountModel::class);
//    }
//    public function driver()
////    {
////        return $this->belongsTo(UserModel::class, "driver_id");
////    }
}
