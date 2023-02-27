<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Review;
use App\Models\Artist;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // restituisce lista recensioni in base all'id di autenticazione linkato all'artista
        $user_id = Auth::id();
        $artist = Artist::firstWhere('user_id', $user_id);
        $reviews = Review::where('artist_id', $artist->id)->get();

        return view('admin.reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReviewRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReviewRequest $request)
    {
        $data = $request->validated();

        $new_review = new Review();
        $new_review->fill($data);
        $new_review->slug = Str::slug($new_review->title);
        $new_review->save();

        return redirect()->route('admin.reviews.index')->with('message', "$new_review->title aggiunta con successo.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        // il controllo blocca la show a delle review appartenenti ad altri artisti se non quello loggato
        $user_id = Auth::id();
        $artist = Artist::firstWhere('user_id', $user_id);
        if ($review->artist_id === $artist->id) {
            return view('admin.reviews.show', compact('review'));
        } else {
            return redirect()->view('admin.reviews.index')->with('message', 'azione non autorizzata');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        return view('admin.reviews.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReviewRequest  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        $old_title = $review->title;

        $data = $request->validated();

        $review->slug = Str::slug($data['title']);
        $review->update($data);

        return redirect()->route('admin.reviews.index')->with('message', "La review $old_title è stata aggiornata.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        $old_title = $review->title;

        $review->delete();

        return redirect()->route('admin.reviews.index')->with('message', "La review $old_title è stata cancellata." );
    }
}
