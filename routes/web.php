<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DogController;

Route::get('/', function () {
    return redirect()->route('dogs.index');
});

Route::get('/', function () {
    return view('welcome');
});

Route::resource('dogs', DogController::class);
Route::get('dogs/trashed/all', [DogController::class, 'trashed'])->name('dogs.trashed');
Route::patch('dogs/{id}/restore', [DogController::class, 'restore'])->name('dogs.restore');
Route::delete('dogs/{id}/force-delete', [DogController::class, 'forceDelete'])->name('dogs.forceDelete');