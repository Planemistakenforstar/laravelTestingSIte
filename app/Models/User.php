<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Track;
use App\Models\Play;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];
        public function isArtist(): bool
    {
        return in_array($this->role, ['artist', 'both'], true);
    }

    public function isMediaPlayer(): bool
    {
        return in_array($this->role, ['media_player', 'both'], true);
    }

    // Tracks this user uploaded (as an artist)
    public function tracks()
    {
        return $this->hasMany(Track::class);
    }

    // Plays this user logged (as a media player)
    public function plays()
    {
        return $this->hasMany(Play::class, 'media_player_id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
