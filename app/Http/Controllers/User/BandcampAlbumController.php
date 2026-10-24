<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class BandcampAlbumController extends Controller
{
    public function show(Request $request)
    {
        $albumUrl = $request->query('url');

        if (!$albumUrl) {
            abort(400, 'Missing album URL');
        }

        $embedHtml = Cache::remember('bc_embed_' . md5($albumUrl), 86400, function () use ($albumUrl) {
            $res = Http::get('https://bandcamp.com/oembed', [
                'format' => 'json',
                'url'    => $albumUrl,
            ]);

            return $res->successful() ? ($res->json()['html'] ?? '') : '';
        });

        return view('dashboard.album', compact('albumUrl', 'embedHtml'));  // dashboard/album.blade.php
    }
}
