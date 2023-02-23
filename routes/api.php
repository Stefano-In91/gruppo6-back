<?php

use App\Http\Controllers\Api\ArtistController;
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

Route::get('pippo', [ArtistController::class, 'pippo']);
