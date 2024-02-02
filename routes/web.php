<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landing');
});

Route::get('test/subscribe', [StationController::class, 'useStation'])->name('use.station');
Route::post('station/monitor', [StationController::class, 'receiveData']);
Route::get('monitoring', function(){
    return view('monitoring');
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
