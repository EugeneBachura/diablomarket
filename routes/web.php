<?php

use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\ElixirController;
use App\Http\Controllers\EquipmentsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/advertisements/elixir/create', [AdvertisementController::class, 'createElixir'])->name('advertisements.createElixir');
    Route::post('/advertisements/elixir', [AdvertisementController::class, 'storeElixir'])->name('advertisements.storeElixir');

    Route::get('/advertisements/gem/create', [AdvertisementController::class, 'createGem'])->name('advertisements.createGem');
    Route::post('/advertisements/gem', [AdvertisementController::class, 'storeGem'])->name('advertisements.storeGem');

    Route::post('/advertisements/equipment', [AdvertisementController::class, 'storeEquipment'])->name('advertisements.storeEquipment');
    Route::post('/advertisements/weapon', [AdvertisementController::class, 'storeWeapon'])->name('advertisements.storeWeapon');
});
Route::get('elixirs/search', [ElixirController::class, 'search'])->name('elixirs.search');
Route::get('equipments/search', [EquipmentsController::class, 'search'])->name('equipments.search');
Route::get('weapons/search', [EquipmentsController::class, 'search'])->name('weapons.search');

require __DIR__ . '/auth.php';
