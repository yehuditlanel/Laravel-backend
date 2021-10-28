<?php

use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;

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
Route::get('api/game', [GameController::class, 'index']);
Route::get('api/game/{id}', [GameController::class, 'show']);
Route::put('api/game/update/{id}',[GameController::class,'update']);
Route::post('api/game',[GameController::class,'store']);
Route::delete('api/game/{id}',[GameController::class,'delete']);
Route::get('search', [GameController::class, 'autocomplete']);
