<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ReviewController extends Controller
{
    public function review(Request $request)
    {
      $request->validate([
        'artist_id' => 'required|exists:artists,id',
        'title' => 'required|max:30',
        'review_text' => 'required|max:1000',
      ]);

      $data = $request->all();

      $new_review = new Review();
      $new_review->fill($data);
      $new_review->date = Carbon::now();
      $slug_matrix = "$new_review->title $new_review->date";
      $new_review->slug = Str::slug( $slug_matrix );
      $new_review->save();
    }
}