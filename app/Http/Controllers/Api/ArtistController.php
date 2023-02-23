<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artist;

class ArtistController extends Controller
{
    public function index()
    {
        $artists = Artist::with('user', 'techniques', 'sponsors', 'ratings', 'reviews')->get();
        return $artists;
    }

    public function show($slug)
    {
        try {
            //davide: non ho messo rating ma mi servirà per le stelline
            $artist = Artist::where('slug', $slug)->with('user', 'techniques')->firstOrFail();
            return $artist;
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response([
                'error' => '404 artist not found'
            ], 404);
        }
    }
}
