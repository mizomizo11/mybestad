<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Patient extends Authenticatable
{
    protected $table = 'patients';
    protected $fillable = [
        'name',
        'mobile',
        'email',
        'email_verified_at',
        'password',
        'country_id',
        'remember_token',
        'image',
        'free_payment',
        'timezone_id',
        'locked',
    ];
    use HasFactory;
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function timezone()
    {
        return $this->belongsTo(Timezone::class);
    }
    public function consultaions()
    {
        return $this->hasMany(Consultation::class);
    }
}
