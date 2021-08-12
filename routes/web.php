<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;

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

Route::get('/inventories', [InventoryController::class, 'index'])->name('inventory.index');

Route::get('/inventories/new', [InventoryController::class, 'showNewForm'])->name('inventory.new');
Route::post('/inventories/new', [InventoryController::class, 'new']);

Route::get('/inventories/{item}', [InventoryController::class, 'showItem'])->name('inventory.item');

Route::post('/inventories/{item}', [InventoryController::class, 'delete'])->name('inventory.delete');

Route::get('/inventories/{item}/edit', [InventoryController::class, 'showEditForm'])->name('inventory.edit');
Route::post('/inventories/{item}/edit', [InventoryController::class, 'edit']);
