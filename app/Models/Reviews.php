<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;

    protected $fillable = [
        'gym_id',
        'overall_rating',
        'facilities_rating',
        'curriculum_rating',
        'teachers_rating',
        'safety_rating',
        'comment',
        'user_id',
        'approved',
        'email',
        'review_by',
        'experience',
        'ip_address',
        'owner_comment',
        'owner_comment_date',
        'owner_comment_approved',
        'helpful',
        'nohelp',
        'email_verified'
    ];
}
