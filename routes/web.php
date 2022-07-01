<?php

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

use App\Http\Controllers\MovieController;

Route::get('/', [MovieController::class, 'index']);
Route::get('/movies/create', [MovieController::class, 'create'])->middleware('auth');
Route::get('/movies/{id}', [MovieController::class, 'show']);
Route::post('/movies', [MovieController::class, 'store']);
Route::delete('/movies/{id}', [MovieController::class, 'destroy'])->middleware('auth');
Route::get('/movies/edit/{id}', [MovieController::class, 'edit'])->middleware('auth');
Route::put('/movies/update/{id}', [MovieController::class, 'update'])->middleware('auth');

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/dashboard', [MovieController::class, 'dashboard'])->middleware('auth');
