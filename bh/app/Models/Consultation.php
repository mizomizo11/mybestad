<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    protected $table = 'consultations';
    protected $fillable = [
        'doctor_id',
        'patient_id',
        'payment_id',
        'appointment_id',
        'status',
        'symptoms',
        'diagnosis',
        'recommendations',
        'additional_instructions',
        'referrals',
        'following_plan',
        'notes',
    ];
    use HasFactory;
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function appointment()
    {
        return $this->hasOne(Appointment::class);
    }


    public function files()
    {
        return $this->hasMany(ConsultationFile::class);
    }
}
