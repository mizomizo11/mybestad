<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Doctor extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guard='doctor';
    protected $table = 'doctors';
    protected $fillable = [
        'name',
        'email',
        'password',
        'age',
        'mobile',
        'country_id',
        'specialty_id',
        'years_of_experience',
        'place_of_work' ,
        'certificate_issuer',
        'personal_image',
        'certificate_image',
        'locked',
        'stopped',
        'timezone_id',
        'details_ar',
        'details_en',
    ];

    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function timezone()
    {
        return $this->belongsTo(Timezone::class);
    }
    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
//        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
//        'password' => 'hashed',
    ];
}
