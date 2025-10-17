<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'faqs';
    protected $fillable =[
        'question_ar',
        'answer_ar',
        'question_en',
        'answer_en' ,
        'record_order',
    ];
    use HasFactory;
}
