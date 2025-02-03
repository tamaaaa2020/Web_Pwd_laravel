<?php

namespace App\Http\Controllers;

use App\Models\PlaylistSong;
use App\Models\Playlist;
use App\Models\Song;
use Illuminate\Http\Request;

class PlaylistSongController extends Controller
{
    // Menambahkan lagu ke playlist
    public function store(Request $request)
    {
        $validated = $request->validate([
            'playlist_id' => 'required|exists:playlists,playlist_id',
            'song_id' => 'required|exists:songs,songs_id',
        ]);

        // Menambahkan lagu ke playlist
        $playlistSong = PlaylistSong::create([
            'playlist_id' => $validated['playlist_id'],
            'song_id' => $validated['song_id'],
            'added_at' => now(), // Waktu saat lagu ditambahkan
        ]);

        return response()->json(['message' => 'Song added to playlist successfully', 'data' => $playlistSong], 201);
    }

    // Menampilkan lagu dalam playlist
    public function show($playlistId)
    {
        $playlistSongs = PlaylistSong::with('song')->where('playlist_id', $playlistId)->get();

        if ($playlistSongs->isEmpty()) {
            return response()->json(['message' => 'No songs found in this playlist'], 404);
        }

        return response()->json($playlistSongs);
    }

    // Menghapus lagu dari playlist
    public function destroy($playlistId, $songId)
    {
        $playlistSong = PlaylistSong::where('playlist_id', $playlistId)->where('song_id', $songId)->first();

        if (!$playlistSong) {
            return response()->json(['message' => 'Song not found in playlist'], 404);
        }

        $playlistSong->delete();

        return response()->json(['message' => 'Song removed from playlist successfully']);
    }
}
