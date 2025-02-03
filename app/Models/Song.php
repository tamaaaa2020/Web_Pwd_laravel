<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    // Menentukan primary key untuk tabel ini
    protected $primaryKey = 'songs_id';

    // Kolom yang dapat diisi (fillable)
    protected $fillable = [
        'album_id',
        'title',
        'duration',
        'genre',
        'release_date',
    ];

    // Relasi dengan model Album (satu album memiliki banyak lagu)
    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id', 'albums_id');
    }
}
