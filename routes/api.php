<?php

use App\Http\Controllers\API\MessageController;
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


// sanctum middleware needs to be added
Route::post('/messages/{id}/unlock', [MessageController::class, 'unlock']);

// sanctum middleware needs to be added
Route::post('/messages/{id}/send-invites', [MessageController::class, 'sendInvites']);