<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;

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
    return redirect()->route('login');
});

// useless routes
// Just to demo sidebar dropdown links active states.

Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function()
{
    Route::get('dashboard', function() {return view('dashboard');} )->name('dashboard');
    Route::get('users', [UserController::class, 'index'] )->name('users.index');
    Route::get('users/create', [UserController::class, 'create'] )->name('users.create');
    Route::get('users/edit/{id}', [UserController::class, 'edit'] )->name('users.edit');
    Route::put('users/update/{id}', [UserController::class, 'update'] )->name('users.update');
    Route::post('users', [UserController::class, 'store'] )->name('users.store');
    Route::delete('users/delete/{id}', [UserController::class, 'delete'] )->name('users.delete');


    Route::get('doctors', [DoctorController::class, 'index'] )->name('doctors.index');
    Route::get('doctors/create', [DoctorController::class, 'create'] )->name('doctors.create');
    Route::get('doctors/edit/{id}', [DoctorController::class, 'edit'] )->name('doctors.edit');
    Route::put('doctors/update/{id}', [DoctorController::class, 'update'] )->name('doctors.update');
    Route::post('doctors', [DoctorController::class, 'store'] )->name('doctors.store');
    Route::delete('doctors/delete/{id}', [DoctorController::class, 'delete'] )->name('doctors.delete');


    Route::get('patients', [PatientController::class, 'index'] )->name('patients.index');
    Route::get('patients/create', [PatientController::class, 'create'] )->name('patients.create');
    Route::get('patients/edit/{id}', [PatientController::class, 'edit'] )->name('patients.edit');
    Route::put('patients/update/{id}', [PatientController::class, 'update'] )->name('patients.update');
    Route::post('patients', [PatientController::class, 'store'] )->name('patients.store');
    Route::delete('patients/delete/{id}', [PatientController::class, 'delete'] )->name('patients.delete');




});

// Route::get('/buttons/text', function () {
//     return view('buttons-showcase.text');
// })->middleware(['auth'])->name('buttons.text');

// Route::get('/buttons/icon', function () {
//     return view('buttons-showcase.icon');
// })->middleware(['auth'])->name('buttons.icon');

// Route::get('/buttons/text-icon', function () {
//     return view('buttons-showcase.text-icon');
// })->middleware(['auth'])->name('buttons.text-icon');

require __DIR__ . '/auth.php';
