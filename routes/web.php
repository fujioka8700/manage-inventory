<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/inventories', [ItemController::class, 'index'])->name('inventory.index');

Route::get('/inventories/new', [ItemController::class, 'showNewForm'])->name('inventory.new');
Route::post('/inventories/new', [ItemController::class, 'new']);

Route::get('/inventories/{item}', [ItemController::class, 'showItem'])->name('inventory.item');

Route::post('/inventories/{item}', [ItemController::class, 'delete'])->name('inventory.delete');

Route::get('/inventories/{item}/edit', [ItemController::class, 'showEditForm'])->name('inventory.edit');
Route::post('/inventories/{item}/edit', [ItemController::class, 'edit']);
