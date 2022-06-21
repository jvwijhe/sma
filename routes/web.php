<?php

use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/dashboard', function () {
    $user = Auth::user();
    return view('dashboard', [
        'user' => $user
    ]);
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';



Route::get('/messages', [MessageController::class, 'index'])->middleware(['auth'])->name('messages.index');
Route::get('/messages/create', [MessageController::class, 'create'])->middleware(['auth'])->name('messages.create');
Route::get('/messages/{message}', [MessageController::class, 'show'])->name('messages.show')->middleware('signed');
Route::post('/messages', [MessageController::class, 'store'])->middleware(['auth'])->name('messages.store');
Route::get('/messages/{message}/edit', [MessageController::class, 'edit'])->middleware(['auth'])->name('messages.edit');
Route::put('/messages/{message}', [MessageController::class, 'update'])->middleware(['auth'])->name('messages.update');
