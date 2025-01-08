<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gyms extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'website',
        'phone',
        'address',
        'city',
        'city_id',
        'state',
        'zip',
        'lat',
        'lng',
        'stars',
        'details',
        'logo_url',
        'kids_program_url',
        'kids_program_detail',
        'woman_only_program_url',
        'woman_only_program_detail',
        'pricing',
        'schedule_url',
        'business_hour',
        'head_professor',
        'federation_id',
        'special_offer',
        'email',
        'facebook_url',
        'youtube_channel',
        'video_url',
        'awards',
        'team_uuid',
        'country_id',
        'multiple_locations',
        'federation',
        'team',
        'updatedby',
        'approved',
        'source',
        'source_id',
        'user_id',
    ];
}
