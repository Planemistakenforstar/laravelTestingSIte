<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Play;

class Track extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'file_path',
        'genre',
        'city',
        'airplay_permission',
        'permission_granted_at',
        'status',
    ];

    protected $casts = [
        'airplay_permission' => 'boolean',
        'permission_granted_at' => 'datetime',
    ];

    public function artist()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function plays()
    {
        return $this->hasMany(Play::class);
    }

    // The core query: only tracks cleared for airplay and live
    public function scopeClearedForAirplay($query)
    {
        return $query->where('status', 'live')
                     ->where('airplay_permission', true);
    }
}
