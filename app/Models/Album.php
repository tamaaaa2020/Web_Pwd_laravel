<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $primaryKey = 'albums_id'; // Menyesuaikan primary key

    protected $fillable = [
        'artist_id',
        'title',
        'release_date',
        'genre',
    ];

    public function artist()
    {
        return $this->belongsTo(Artist::class, 'artist_id', 'artist_id');
    }
}
