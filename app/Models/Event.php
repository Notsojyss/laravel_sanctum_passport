<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'Title',
        'Content',
        'Location',
        'StartTime',
        'EndTime',
        'key_people',
        'image_path',

    ];

    protected $casts = [
        'key_people' => 'array',
        'StartTime' => 'datetime',
        'EndTime' => 'datetime',
    ];
}
