<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointments';
    protected $fillable = [
        'consultation_id',
        'appointment1',
        'appointment1_confirm',
        'appointment2',
        'appointment2_confirm',
        'appointment3',
        'appointment3_confirm',
        'appointment4',
        'appointment4_confirm',
        'appointment5',
        'appointment5_confirm',
        'status',
    ];
    use HasFactory;

    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }
}
