<?php

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

Route::get('/ping/{host}', [\App\Http\Controllers\HostController::class, 'ping']);
Route::get('/pong', [\App\Http\Controllers\HostController::class, 'pong']);
Route::get('/check', [\App\Http\Controllers\HostController::class, 'check']);
