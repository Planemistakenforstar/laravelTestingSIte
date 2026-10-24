<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTrackRequest;
use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    public function create()
    {
        return view('tracks.create');
    }
    public function store(StoreTrackRequest $request)
    {
        $path = $request->file('file')->store('tracks', 'public');
        $track = $request->user()->tracks()->create([
            'title' => $request->validated('title'),
            'genre' => $request->validated('genre'),
            'city' => $request->validated('city'),
            'file_path' => $path,
            'airplay_permission' => true,
            'permission_granted_at' => now(),
            'status' => 'live',
        ]);

        return redirect()
            ->route('tracks.show', $track)
            ->with('status', 'Track uploaded and cleared for airplay.');
    }
   public function index()
    {
        $tracks = Track::clearedForAirplay()->with('artist')->latest()->paginate(20);
        return view('tracks.index', compact('tracks'));
    }
        public function show(Track $track)
        {
            return view('tracks.show', compact('track'));
        }
}
