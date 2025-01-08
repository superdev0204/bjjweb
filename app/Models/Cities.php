<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'city',
        'county',
        'state',
        'country_id',
        'latitude',
        'longitude',
        'gym_count',
        'filename',
        'statefile',
        'countyfile',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
