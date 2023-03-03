<?php

use App\Http\Controllers\Admin\ArtistController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\SponsorController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\RatingController;
use App\Http\Controllers\Admin\TechniqueController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Artist;
use Illuminate\Support\Carbon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth::user();
        if ( Artist::firstWhere('user_id', $user->id )) {

            $artist = Artist::firstWhere('user_id', $user->id );
            $artist->load('messages', 'ratings', 'reviews');

            $messages = $artist->messages;
            $ratings = $artist->ratings;
            $reviews = $artist->reviews;
            $date = Carbon::now();
            // trovo numero messaggi ricevuti nell'ultimo mese
            $filtered_messages = $messages->filter(function($message) use ($date) {
                return strtotime($message->date) >= strtoTime($date->subMonth());
            });
            $messages = $filtered_messages->count();
            // trovo valutazioni ricevute nell'ultimo mese
            $filtered_ratings = $ratings->filter(function($rating) use ($date) {
                return strtotime($rating->pivot->rating_date) >= strtoTime($date->subMonth());
            });
            $ratings = $filtered_ratings->count(); 
            // trovo recensioni ricevute nell'ultimo mese
            $filtered_reviews = $reviews->filter(function($review) use ($date) {
                return strtotime($review->date) >= strtoTime($date->subMonth());
            });
            $reviews = $filtered_reviews->count();

            return view('admin.dashboard', compact('user', 'messages', 'ratings', 'reviews'));
        } else {
            return redirect()->route('admin.artists.create')->with('message', "Crea il tuo profilo Artista per continuare");
        }

    })->name('dashboard');

    Route::resource('artists', ArtistController::class)->parameters(['artists' => 'artist:slug']);
    // Route::resource('techniques', TechniqueController::class)->parameters(['techniques' => 'technique:slug']);
    Route::resource('messages', MessageController::class)->parameters(['messages' => 'message:slug']);
    Route::resource('reviews', ReviewController::class)->parameters(['reviews' => 'review:slug']);
    Route::resource('ratings', RatingController::class)->parameters(['ratings' => 'rating:slug']);
    Route::resource('sponsors', SponsorController::class)->parameters(['sponsors' => 'sponsor:slug']);
});

require __DIR__.'/auth.php';
