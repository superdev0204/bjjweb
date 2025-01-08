<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gymlogs extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'gym_id',
        'name',
        'website',
        'phone',
        'address',
        'city',
        'state',
        'zip',
        'country',
        'country_id',
        'stars',
        'details',
        'logo_url',
        'kids_program_url',
        'kids_program_detail',
        'woman_only_program_url',
        'woman_only_program_detail	',
        'pricing',
        'schedule_url',
        'business_hour',
        'head_professor',
        'special_offer',
        'email',
        'facebook_url',
        'youtube_channel',
        'video_url',
        'awards',
        'multiple_locations',
        'updatedby',
        'approved',
        'ip_address',
        'created_at',
        'user_id',
    ];
}
