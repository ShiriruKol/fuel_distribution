<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

Route::middleware('admin')->prefix('admin')->group(function () {

    Route::get('/fuels', [\App\Http\Controllers\FuelController::class, 'fuels'])->name('fuels.index');
    Route::get('/fuels/create', [\App\Http\Controllers\FuelController::class, 'create'])->name('fuels.create');
    Route::post('/fuels/store', [\App\Http\Controllers\FuelController::class, 'store'])->name('fuels.store');
    Route::get('/fuels/confirm_destroy/{fuel}', [\App\Http\Controllers\FuelController::class, 'confirm'])->name('fuels.confirm');
    Route::get('/fuels/edit/{fuel}', [\App\Http\Controllers\FuelController::class, 'edit'])->name('fuels.edit');
    Route::patch('/fuels/{fuel}', [\App\Http\Controllers\FuelController::class, 'update'])->name('fuels.update');
    Route::delete('/fuels/{fuel}', [\App\Http\Controllers\FuelController::class, 'destroy'])->name('fuels.destroy');
    Route::get('/fuels/{fuel}', [\App\Http\Controllers\FuelController::class, 'show'])->name('fuels.show');

    Route::get('/type_fuels', [\App\Http\Controllers\TypeFuelController::class, 'type_fuels'])->name('type_fuel.index');
    Route::get('/type_fuel/create/{fuel}',[\App\Http\Controllers\TypeFuelController::class, 'create'])->name('type_fuel.create');
    Route::post('/type_fuel/store', [\App\Http\Controllers\TypeFuelController::class, 'store'])->name('type_fuel.store');
    Route::delete('/type_fuel/{type}', [\App\Http\Controllers\TypeFuelController::class, 'destroy'])->name('type_fuel.destroy');
    Route::patch('/type_fuel/{type}', [\App\Http\Controllers\TypeFuelController::class, 'update'])->name('type_fuel.update');


});

Route::middleware('employee')->prefix('employee')->group(function () {
    Route::get('/type_fuel/create/',[\App\Http\Controllers\TypeFuelController::class, 'create_employee'])->name('type_fuel.create_employee');
    Route::post('/type_fuel/store', [\App\Http\Controllers\TypeFuelController::class, 'store_employee'])->name('type_fuel.store_employee');
    Route::get('/userTypeFuel',[\App\Http\Controllers\TypeFuelController::class, 'typeFuelsUser'])->name('type_fuel.user');
});

require __DIR__.'/auth.php';
