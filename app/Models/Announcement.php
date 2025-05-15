<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Announcement extends Model
{
    use HasFactory;
protected $table = 'announcement';
    protected $fillable = [
        'Title',
        'Content',
        'Location',
        'key_people',
        'StartTime',
        'EndTime',
        'image_path',

    ];

    protected $casts = [
        'key_people' => 'array',
        'StartTime' => 'datetime',
        'EndTime' => 'datetime',
    ];
}
