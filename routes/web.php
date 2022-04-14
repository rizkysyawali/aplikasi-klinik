<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\TreatmentController;

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
    Route::get('dashboard', [UserController::class, 'dashboard'] )->name('dashboard');
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


    Route::get('treatment', [TreatmentController::class, 'index'] )->name('treatment.index');
    Route::get('treatment/create', [TreatmentController::class, 'create'] )->name('treatment.create');
    Route::get('treatment/edit/{id}', [TreatmentController::class, 'edit'] )->name('treatment.edit');
    Route::put('treatment/update/{id}', [TreatmentController::class, 'update'] )->name('treatment.update');
    Route::post('treatment', [TreatmentController::class, 'store'] )->name('treatment.store');
    Route::delete('treatment/delete/{id}', [TreatmentController::class, 'delete'] )->name('treatment.delete');


    Route::get('medicines', [MedicineController::class, 'index'] )->name('medicines.index');
    Route::get('medicines/create', [MedicineController::class, 'create'] )->name('medicines.create');
    Route::get('medicines/edit/{id}', [MedicineController::class, 'edit'] )->name('medicines.edit');
    Route::put('medicines/update/{id}', [MedicineController::class, 'update'] )->name('medicines.update');
    Route::post('medicines', [MedicineController::class, 'store'] )->name('medicines.store');
    Route::delete('medicines/delete/{id}', [MedicineController::class, 'delete'] )->name('medicines.delete');


    oute::get('prescription', [MedicineTreatmentController::class, 'index'] )->name('prescription.index');
    Route::get('prescription/create', [MedicineTreatmentController::class, 'create'] )->name('prescription.create');
    Route::get('prescription/edit/{id}', [MedicineTreatmentController::class, 'edit'] )->name('prescription.edit');
    Route::put('prescription/update/{id}', [MedicineTreatmentController::class, 'update'] )->name('prescription.update');
    Route::post('prescription', [MedicineTreatmentController::class, 'store'] )->name('prescription.store');
    Route::delete('prescription/delete/{id}', [MedicineTreatmentController::class, 'delete'] )->name('prescription.delete');
});

require __DIR__ . '/auth.php';
