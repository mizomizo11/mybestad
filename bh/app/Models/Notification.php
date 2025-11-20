<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';
    protected $fillable = [
        'fromm',
        'to',
        'doctor_id',
        'patient_id',
        'notification',
        'link',
        'read',


    ];
    use HasFactory;

}
