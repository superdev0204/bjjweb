<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Athlete extends Model
{
    use HasFactory;

    protected $table = 'athlete';

    protected $fillable = [
        'uuid',
        'first_name',
        'last_name',
        'display_name',
        'gym_id',
        'current_belt',
        'years_training',
        'first_year_training',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'zip',
        'country_id',
        'is_ibjjf_certified',
        'professor',
        'introduction',
        'youtube_channel',
        'website',
        'facebook_url',
        'instagram_url',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
