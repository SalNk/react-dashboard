<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route::get('/melogin', [UserController::class, 'login'])->name('login');
Route::post('/melogin', [UserController::class, 'handleLogin'])->name('login');

Route::get('/meregister', [UserController::class, 'register'])->name('register');
Route::post('/meregister', [UserController::class, 'handleRegister'])->name('register');

Route::middleware('auth')->group(function () {
    Route::prefix('/admin')->group(function () {

        Route::get('/dashboard', [PageController::class, 'show'])->name('dashboard');

        Route::prefix('/departement')->group(function () {
            Route::get('/', [DepartementController::class, 'index'])->name('departement.index');
            Route::get('/create', [DepartementController::class, 'create'])->name('departement.create');
            Route::post('/create', [DepartementController::class, 'store'])->name('departement.store');
            Route::get('/edit/{departement}', [DepartementController::class, 'edit'])->name('departement.edit');
            Route::get('/update/{departement}', [DepartementController::class, 'update'])->name('departement.update');
            Route::get('/delete/{departement}', [DepartementController::class, 'delete'])->name('departement.delete');
        });

        Route::prefix('/employe')->group(function () {
            Route::get('/', [EmployeController::class, 'index'])->name('employe.index');
            Route::post('/create', [EmployeController::class, 'store'])->name('employe.store');
            Route::get('/create', [EmployeController::class, 'create'])->name('employe.create');
            Route::get('/edit/{employe}', [EmployeController::class, 'edit'])->name('employe.edit');
            Route::get('/delete/{employe}', [EmployeController::class, 'delete'])->name('employe.delete');
            Route::get('/update/{employe}', [EmployeController::class, 'update'])->name('employe.update');
        });

        Route::prefix('/configuration')->group(function () {
            Route::get('/', [ConfigurationController::class, 'index'])->name('config.index');
            Route::get('/create', [ConfigurationController::class, 'create'])->name('config.create');
            Route::post('/create', [ConfigurationController::class, 'store'])->name('config.store');
            Route::get('/delete/{configuration}', [ConfigurationController::class, 'delete'])->name('config.delete');
        });
    });
});