<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ManagerPlayerController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('players', PlayerController::class);
Route::get('/managers', [ManagerController::class, 'index'])->name('managers.index');
Route::get('/managers/{id}', [ManagerController::class, 'show'])->name('managers.show');
Route::resource('managers.players', ManagerPlayerController::class)->only(['index']);