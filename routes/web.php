<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ManageController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ContactController::class, 'contact_index']);
Route::post('/', [ContactController::class, 'contact_confirm'])->name('confirm');
Route::get('/modify', [ContactController::class, 'contact_modify']);
Route::get('/thank', [ContactController::class, 'contact_thank'])->name('thank');

Route::get('/manage', [ManageController::class, 'manage_top']);
Route::get('/search', [ManageController::class, 'manage_search_get']);
Route::post('/search', [ManageController::class, 'manage_search']);
Route::get('/delete', [ManageController::class, 'manage_delete'])->name('delete');

