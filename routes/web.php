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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('tshirt', \App\Http\Controllers\TshirtController::class);

Route::get('/tshirt/merge/{model}/{size}/{folder}/{imgSelected}/',[\App\Http\Controllers\ImageInterventionController::class, 'mergeImages'])->name('mergeImages');

Route::post('/tshirt/upload/',[\App\Http\Controllers\ImageInterventionController::class, 'upload'])->name('upload');

Route::get('download_pdf/{id}',[\App\Http\Controllers\GeneratorPDF::class, 'getTshirtPdf'])-> name('getTshirtPdf');
