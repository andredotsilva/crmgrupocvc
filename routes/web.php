<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ParishController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\ServicosController;
use App\Http\Controllers\ContractsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProvidersController;
use App\Http\Controllers\EnergiagasController;
use App\Http\Controllers\FilesUploadController;
use App\Http\Controllers\MunicipalityController;
use App\Http\Controllers\PlansController;

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










Route::middleware('auth')->group(function () {
    Route::get('/plans/plansbyproviderid', [PlansController::class, 'plansbyproviderid'])->name('plansbyproviderid');
    Route::get('/contracts/fetchbycpe', [ContractsController::class, 'fetchbycpe'])->name('contacts.fetchbycpe');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/contracts', ContractsController::class);
    Route::post('/upload', [FilesUploadController::class, 'store']);
    Route::delete('/destroy', [FilesUploadController::class, 'destroy']);
    Route::get('/download/{id}', [ContractsController::class, 'download'])->name('download');
    Route::get('/delete/{id}', [ContractsController::class, 'delete'])->name('delete');
    Route::apiResource('/district', DistrictController::class);
    Route::apiResource('/municipality', MunicipalityController::class);
    Route::apiResource('/parish', ParishController::class);
    Route::resource('/plans', PlansController::class);

    Route::middleware('restrictClients')->group(function () {
        Route::get('/users/search', [UsersController::class, 'search'])->name('users.search');
        Route::resource('/users', UsersController::class);
        Route::resource('/providers', ProvidersController::class);
        Route::get('/utilizadores', [UsersController::class, 'index'])
            ->middleware(['auth', 'verified'])
            ->name('users');


        Route::get('/servicos', [ServicosController::class, 'index'])
            ->name('servicos');
        Route::get('/energia-gas', [EnergiagasController::class, 'index'])
            ->name('energia');

        // Rotas que exigem permissão
    });
});


require __DIR__ . '/auth.php';
