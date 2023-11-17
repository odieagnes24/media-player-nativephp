<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'title',
        'artist',
        'album',
        'playtime',
        'art',
        'mime_type',
    ];
}
