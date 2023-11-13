<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Songs extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'title',
        'artist',
        'album',
        'playtime',
        'picture',
        'mime_type',
    ];
}
