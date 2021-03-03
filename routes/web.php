<?php

use App\Http\Controllers\PhoneController;
use Illuminate\Support\Facades\DB;
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
    Debugbar::info('Sve je OK.');
    return view('welcome');
});


// Route::get('/phones', 'PhoneController@index'); // Stara sintaksa Laravela

// Route::get('/phones', [PhoneController::class, 'index']);  // Nova sintaksa Laravela 8

Route::resource('/phones', PhoneController::class);
