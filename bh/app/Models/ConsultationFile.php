<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultationFile extends Model
{
    protected $table = 'consultations_files';
    protected $fillable = [
        'consultation_id',
        'file',
    ];
    use HasFactory;

    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }

}
