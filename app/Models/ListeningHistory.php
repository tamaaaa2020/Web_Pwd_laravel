<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListeningHistory extends Model
{
    use HasFactory;

    protected $table = 'listening_history';
    public $timestamps = false;
    public $incrementing = false;

    protected $primaryKey = ['user_id', 'song_id', 'played_at'];
    protected $keyType = 'string';

    protected $fillable = [
        'user_id',
        'song_id',
        'played_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function song()
    {
        return $this->belongsTo(Song::class, 'song_id', 'song_id');
    }
}
