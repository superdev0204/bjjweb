<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zipcodes extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'zipcode',
        'lat',
        'lng',
        'city',
        'county',
        'state',
        'type',
        'clinic_count',
        'cityfile',
        'statefile',
        'countyfile',
        'ludate',
    ];
}
