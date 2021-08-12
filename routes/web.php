<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoriesController;

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

Route::get('/inventories', [InventoriesController::class, 'index'])->name('inventories.index');

Route::get('/inventories/new', [InventoriesController::class, 'showNewForm'])->name('inventories.new');
Route::post('/inventories/new', [InventoriesController::class, 'new']);

Route::get('/inventories/{item}', [InventoriesController::class, 'showItem'])->name('inventories.item');

Route::post('/inventories/{item}', [InventoriesController::class, 'delete'])->name('inventory.delete');

Route::get('/inventories/{item}/edit', [InventoriesController::class, 'showEditForm'])->name('inventories.edit');
Route::post('/inventories/{item}/edit', [InventoriesController::class, 'edit']);

