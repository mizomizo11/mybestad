<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventModel extends Model
{
    protected $table = 'events';
    protected $fillable =[
        'animals_kind',
        'breed_kind',
        'breed_property',
        'from',
        'to',
        'event_class',
        'event_kind',
        'training_type_and_field',


        ];


    use HasFactory;


    public function country()
    {
        return $this->belongsTo(CountryModel::class);
    }


}
