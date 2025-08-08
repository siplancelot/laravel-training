<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarCategoryController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/car',[CarController::class, 'index'] )->name('car-index');
Route::get('/car-category',[CarCategoryController::class, 'index'] )->name('category-index');
Route::get('/transaction',[TransactionController::class, 'index'] )->name('transaction-index');

Route::post('/add-transaction', [TransactionController::class, 'store'])->name('transaction-store');


Route::post('/car', [CarController::class, 'store'])->name('car-post');
Route::get('/get-one-car', [CarController::class, 'getOneData'])->name('car-one-data');
Route::patch('/update-car/{id}', [CarController::class, 'update'])->name('car-update');
Route::delete('/delete-car/{id}', [CarController::class, 'destroy'])->name('car-destroy');



// Route::get('/data-dummy/add', function () {
//     return view('crud.add');
// })->name('add-data');

// Route::get('/data-dummy/update/{id}', [DataController::class, 'show'])->name('update-data');

// Route::post('/add-data-dummy', [DataController::class, 'store'])->name('data-store');
// Route::patch('/update-data-dummy', [DataController::class, 'update'])->name('data-edit');
// Route::delete('/delete-data', [DataController::class, 'destroy'])->name('data-delete');


