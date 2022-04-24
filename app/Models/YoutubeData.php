<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YoutubeData extends Model
{
    use HasFactory;

    protected $fillable = [
        'youtube_video_id',
        'status'
    ];

    public $timestamps = true;
}
