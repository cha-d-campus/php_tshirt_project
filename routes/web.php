<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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

//Route::get('/', function () {
//    return view('index');
//});


Route::resource('tshirt', \App\Http\Controllers\TshirtController::class);

Route::get('/tshirt/merge/{model}/{imgSelected}',[\App\Http\Controllers\ImageInterventionController::class, 'mergeImages'])->name('mergeImages');
