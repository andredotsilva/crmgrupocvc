<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CAEController;
use App\Http\Controllers\PlansController;
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
    Route::delete('/delete/{id}', [ContractsController::class, 'delete'])->name('delete');
    Route::apiResource('/district', DistrictController::class);
    Route::apiResource('/municipality', MunicipalityController::class);
    Route::get('/parish-related', [ParishController::class, 'getParishWithRelatedData']);
    Route::apiResource('/parish', ParishController::class);
    Route::resource('/plans', PlansController::class);

    Route::resource('/providers', ProvidersController::class);


    Route::get('/servicos', [ServicosController::class, 'index'])
        ->name('servicos');
    Route::get('/energia-gas', [EnergiagasController::class, 'index'])
        ->name('energia');


    Route::resource('/cae', CAEController::class);

    Route::resource('/users', UsersController::class);
    Route::get('/users/fetchuserbycode/{code}', [UsersController::class, 'fetchUserByCode']);
    Route::get('/users/search', [UsersController::class, 'search'])->name('users.search');
});


require __DIR__ . '/auth.php';
