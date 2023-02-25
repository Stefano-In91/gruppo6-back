<?php

use App\Http\Controllers\Api\ArtistController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\RatingController;
use App\Http\Controllers\Api\ReviewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('artists', [ArtistController::class, 'index']);
Route::get('artist/{slug}', [ArtistController::class, 'show']);
Route::get('artist-id/{slug}', [ArtistController::class, 'id']);
Route::get('ratings', [RatingController::class, 'index']);

Route::post('send-message', [MessageController::class, 'message']);
Route::post('send-rating', [RatingController::class, 'rating']);
Route::post('send-review', [ReviewController::class, 'review']);
