<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';
    protected $fillable =[
        'country_ar',
        'country_en',
        'city_ar',
        'city_en',
        'address_ar',
        'address_en',
        'mobile1',
        'mobile2',
        'mobile3',
        'whatsapp',
        'tel1',
        'tel2',
        'tel3',
        'fax',
        'email1',
        'email2',
        'email3',
        'postal_code',
        'url',
        'facebook',
        'twitter',
        'linkedin',
        'google',
        'youtube',
        'instagram',
        'longitude',
        'latitude',
        'info_ar',
        'info_en'


    ];
    use HasFactory;
}
