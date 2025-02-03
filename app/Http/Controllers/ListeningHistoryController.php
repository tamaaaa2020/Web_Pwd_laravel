<?php

namespace App\Http\Controllers;

use App\Models\ListeningHistory;
use Illuminate\Http\Request;

class ListeningHistoryController extends Controller
{
    public function index()
    {
        $history = ListeningHistory::all();
        return response()->json($history);
    }

    public function show($userId, $songId, $playedAt)
    {
        $history = ListeningHistory::where('user_id', $userId)
            ->where('song_id', $songId)
            ->where('played_at', $playedAt)
            ->firstOrFail();
        
        return response()->json($history);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,user_id',
            'song_id' => 'required|exists:songs,song_id',
            'played_at' => 'required|date',
        ]);

        $history = ListeningHistory::create($request->all());
        return response()->json($history, 201);
    }

    public function destroy($userId, $songId, $playedAt)
    {
        $history = ListeningHistory::where('user_id', $userId)
            ->where('song_id', $songId)
            ->where('played_at', $playedAt)
            ->firstOrFail();
        
        $history->delete();
        return response()->json(null, 204);
    }
}
