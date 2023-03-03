<?php

use App\Http\Controllers\InformationController;
use App\Models\Information;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('website');
})->name('index');

Route::resource('information',InformationController::class);
Route::get('trash',[InformationController::class,'trash'])->name('trash.data');
Route::get('restore/{id}',[InformationController::class,'restore'])->name('restore.data');
Route::get('delete/{id}',[InformationController::class,'delete'])->name('delete.data');
