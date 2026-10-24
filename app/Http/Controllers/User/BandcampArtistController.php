<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BandcampArtistController extends Controller
{
    public function show(Request $request)
    {
        $artistUrl = $request->query('url');

        if (!$artistUrl) {
            abort(400, 'Missing artist URL');
        }

        $albums = $this->getArtistAlbums($artistUrl);
        return view('dashboard.artist', compact('albums', 'artistUrl'));
    }

    private function getArtistAlbums(string $artistUrl): array
    {
        return []; // TODO: implement scraping / third-party
    }
}
