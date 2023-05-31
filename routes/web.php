<?php

use App\Http\Controllers\ContractController;
use App\Http\Controllers\ContractsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\FilesUploadController;
use App\Http\Controllers\MunicipalityController;
use App\Http\Controllers\ParishController;
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
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/contracts', ContractsController::class);
    Route::post('/upload', [FilesUploadController::class, 'store']);
});

Route::post('/district', [DistrictController::class, 'store']);
Route::post('/municipality', [MunicipalityController::class, 'store']);
Route::post('/parish', [ParishController::class, 'store']);




require __DIR__ . '/auth.php';
