<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'title',
        'organizer',
        'photo',
        'location',
        'date',
        'time',
        'slots',
        'fee',
        'registration',
        'contact_person',
        'barcode_photo',
        'description'
    ];
}
