<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rating;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{
  public function index() 
  {
    $ratings = Rating::all();
    return $ratings;
  }

  public function rating(Request $request)
  {
    $request->validate([
      'artist_id' => 'required|exists:artists,id',
      'rating_id' => 'required|exists:ratings,id',
    ]);

    $data = $request->all();

    DB::table('artist_rating')->insert([
      'artist_id' => $data['artist_id'],
      'rating_id' => $data['rating_id'],
      'rating_date' => Carbon::now(),
  ]); 
  }
}