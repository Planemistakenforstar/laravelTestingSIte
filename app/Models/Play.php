<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Play extends Model
{
    protected $fillable = [
        'track_id',
        'media_player_id',
        'played_at',
        'show_name',
        'notes',
    ];

    protected $casts = [
        'played_at' => 'datetime',
    ];

    public function track()
    {
        return $this->belongsTo(Track::class);
    }

    public function mediaPlayer()
    {
        return $this->belongsTo(User::class, 'media_player_id');
    }
}
