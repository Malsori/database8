<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\viewController;
use App\Http\Controllers\CreateController;


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

// Route::get('/', function () {
//     return view('welcome');
// });



// Route::match(['get','post'],'/create',[CreateController::class,'create'])->name('create');



// Route::match(['get','put'],'{id}/edit', [CreateController::class, 'edit'])->name('edit');

// Route::match(['get','put'],'{id}/update', [CreateController::class, 'update'])->name('update');

// Route::get('/todos/{id}', [CreateController::class, 'destroy'])->name('delete');


Route::resource('/todos',CreateController::class);




