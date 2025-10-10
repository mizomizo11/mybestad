<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'users';
    use HasFactory;

    public $fillable =[
        'id',
        'name',
        'name_eng',
        'mobile',
        'email',
        'password',
        'image',
        'permissions'
    ];
}
