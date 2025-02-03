<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PlaylistSong extends Pivot
{
    // Menentukan nama tabel yang digunakan oleh model ini
    protected $table = 'playlist_songs';

    // Menentukan kolom yang bisa diisi (fillable)
    protected $fillable = [
        'playlist_id',
        'song_id',
        'added_at',
    ];

    // Relasi dengan model Playlist
    public function playlist()
    {
        return $this->belongsTo(Playlist::class, 'playlist_id', 'playlist_id');
    }

    // Relasi dengan model Song
    public function song()
    {
        return $this->belongsTo(Song::class, 'song_id', 'songs_id');
    }
}
