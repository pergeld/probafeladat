<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;

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

Route::get('/create', [ProjectController::class, 'create'])->name('create');
Route::post('/store', [ProjectController::class, 'store'])->name('store');
Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('edit');
Route::patch('/projects/{project}', [ProjectController::class, 'update'])->name('update');

Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contactDestroy');
