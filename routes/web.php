<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;
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


Route::view('master', 'Layouts.master');

Route::resource('devices', DeviceController::class);
Route::resource('products', ProductController::class);
Route::resource('students', StudentController::class);

Route::prefix('admin')
    ->as('admin.')
    ->group(function () {
        Route::view('dashboard', 'admin.dashboard')->name('dashboard');

        // Route::get('brands', [BrandController::class, 'index'])->name('brands.index');
        // Route::get('brands/create', [BrandController::class, 'create'])->name('brands.create');
        // Route::post('brands/store', [BrandController::class, 'store'])->name('brands.store');
        // Route::get('brands/{brand}', [BrandController::class, 'show'])->name('brands.show');
        // Route::get('brands/{id}/edit', [BrandController::class, 'edit'])->name('brands.edit');
        // Route::put('brands/{id}', [BrandController::class, 'update'])->name('brands.update');
        // Route::delete('brands/{id}', [BrandController::class, 'delete'])->name('brands.delete');
        Route::resource('cars', CarController::class);
        Route::resource('brands', BrandController::class);
    });
