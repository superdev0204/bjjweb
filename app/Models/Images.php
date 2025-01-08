<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'gym_id',
        'imagename',
        'altname',
        'updatedby',
        'approved',
        'created'
    ];
}
