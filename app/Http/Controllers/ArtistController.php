<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function index()
    {
        return response()->json(Artist::all(), 200);
    }

    public function show($id)
    {
        $artist = Artist::find($id);
        if (!$artist) {
            return response()->json(['message' => 'Artist not found'], 404);
        }
        return response()->json($artist, 200);
    }

    public function store(Request $request)
    {
        $artist = Artist::create($request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'country' => 'nullable|string|max:255',
        ]));

        return response()->json($artist, 201);
    }

    public function update(Request $request, $id)
    {
        $artist = Artist::find($id);
        if (!$artist) {
            return response()->json(['message' => 'Artist not found'], 404);
        }
        
        $artist->update($request->validate([
            'name' => 'sometimes|required|string|max:255',
            'bio' => 'nullable|string',
            'country' => 'nullable|string|max:255',
        ]));
        
        return response()->json($artist, 200);
    }

    public function destroy($id)
    {
        $artist = Artist::find($id);
        if (!$artist) {
            return response()->json(['message' => 'Artist not found'], 404);
        }
        
        $artist->delete();
        return response()->json(['message' => 'Artist deleted successfully'], 200);
    }
}
