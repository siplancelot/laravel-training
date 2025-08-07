<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/data-dummy',[DataController::class, 'index'] )->name('data-index');

Route::get('/data-dummy/add', function () {
    return view('crud.add');
})->name('add-data');

Route::get('/data-dummy/update/{id}', [DataController::class, 'show'])->name('update-data');

Route::post('/add-data-dummy', [DataController::class, 'store'])->name('data-store');
Route::patch('/update-data-dummy', [DataController::class, 'update'])->name('data-edit');
Route::delete('/delete-data', [DataController::class, 'destroy'])->name('data-delete');


