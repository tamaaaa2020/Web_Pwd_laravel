<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Album;
use Illuminate\Http\Request;

class SongController extends Controller
{
    // Menampilkan daftar lagu
    public function index()
    {
        $songs = Song::with('album')->get(); // Mengambil semua lagu dengan relasi album
        return response()->json($songs);
    }

    // Menampilkan detail lagu berdasarkan ID
    public function show($id)
    {
        $song = Song::with('album')->find($id); // Menampilkan lagu berdasarkan ID dengan relasi album

        if (!$song) {
            return response()->json(['message' => 'Song not found'], 404);
        }

        return response()->json($song);
    }

    // Menambahkan lagu baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'album_id' => 'required|exists:albums,albums_id',
            'title' => 'required|string|max:255',
            'duration' => 'required|integer',
            'genre' => 'nullable|string|max:100',
            'release_date' => 'nullable|date',
        ]);

        $song = Song::create($validated);

        return response()->json(['message' => 'Song created successfully', 'data' => $song], 201);
    }

    // Mengupdate lagu berdasarkan ID
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'album_id' => 'sometimes|exists:albums,albums_id',
            'title' => 'sometimes|string|max:255',
            'duration' => 'sometimes|integer',
            'genre' => 'sometimes|string|max:100',
            'release_date' => 'sometimes|date',
        ]);

        $song = Song::find($id);

        if (!$song) {
            return response()->json(['message' => 'Song not found'], 404);
        }

        $song->update($validated);

        return response()->json(['message' => 'Song updated successfully', 'data' => $song]);
    }

    // Menghapus lagu berdasarkan ID
    public function destroy($id)
    {
        $song = Song::find($id);

        if (!$song) {
            return response()->json(['message' => 'Song not found'], 404);
        }

        $song->delete();

        return response()->json(['message' => 'Song deleted successfully']);
    }
}
