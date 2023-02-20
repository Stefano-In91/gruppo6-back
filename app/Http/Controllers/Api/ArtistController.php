<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artist;

class ArtistController extends Controller
{
    public function index() 
    {
        $artists = Artist::with('techniques')->get();
        
        return $artists;
    }

    public function show($slug)
    {
        try {
            $artist = Artist::where('slug', $slug)->with('techniques')->firstOrFail();
            return $artist;
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response([
                'error' => '404 Project not found'
            ], 404);
        }
    }
}