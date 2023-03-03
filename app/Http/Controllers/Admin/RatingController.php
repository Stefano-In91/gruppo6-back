<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use App\Models\Artist;
use App\Http\Requests\StoreRatingRequest;
use App\Http\Requests\UpdateRatingRequest;
use Illuminate\Support\Facades\Auth;
use Termwind\Components\Dd;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( Artist::firstWhere('user_id', Auth::id()) ) {
            $artist = Artist::firstWhere('user_id', Auth::id())->load('ratings');
            $ratings = $artist->ratings;
            $ratings = $ratings->sortByDesc(function($rating) {
                return $rating->pivot->rating_date;
            });

            return view('admin.ratings.index', compact('ratings'));
        } else {
            return redirect()->route('admin.artists.create')->with('message', "Crea il tuo profilo Artista per continuare");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ratings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRatingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRatingRequest $request)
    {
        $data = $request->validated();

        $new_rating = new Rating();
        $new_rating->fill($data);
        $new_rating->save();

        return redirect()->route('admin.ratings.index')->with('message', "$new_rating->title aggiunta con successo.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function show(Rating $rating)
    {
        return view('admin.ratings.show', compact('rating'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function edit(Rating $rating)
    {
        return view('admin.ratings.edit', compact('rating'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRatingRequest  $request
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRatingRequest $request, Rating $rating)
    {
        $old_name = $rating->name;

        $data = $request->validated();
        $rating->update($data);

        return redirect()->route('admin.ratings.index')->with('message', "La Tecnica $old_name è stata aggiornata.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rating $rating)
    {
        $old_name = $rating->name;

        $rating->delete();

        return redirect()->route('admin.ratings.index')->with('message', "La tecnica $old_name è stata cancellata." );
    }
}
