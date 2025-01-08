<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'country';
    // Indicate that the id is not an incrementing integer
    public $incrementing = false;

    protected $fillable = [
        'id',
        'latitude',
        'longitude',
        'name',
        'gym_count',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
