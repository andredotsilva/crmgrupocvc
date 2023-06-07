<?php

use App\Http\Controllers\ContractController;
use App\Http\Controllers\ContractsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\FilesUploadController;
use App\Http\Controllers\MunicipalityController;
use App\Http\Controllers\ParishController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServicosController;
use App\Http\Controllers\EnergiagasController;
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
    
Route::get('/servicos', [ServicosController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('servicos');

Route::get('/energia-gas', [EnergiagasController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('energia');

//Route::apiResource('/servicos', ServicosController::class);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/contracts', ContractsController::class);
    Route::post('/upload', [FilesUploadController::class, 'store']);
});

Route::apiResource('/district', DistrictController::class);
Route::apiResource('/municipality', MunicipalityController::class);
Route::apiResource('/parish', ParishController::class);

require __DIR__ . '/auth.php';
