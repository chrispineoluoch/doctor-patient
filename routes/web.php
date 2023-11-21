<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Reception\DoctorController;
use App\Http\Controllers\Reception\PatientController;
use App\Http\Controllers\Reception\AppointmentController;
use App\Http\Controllers\Reception\SpecializationController;

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

// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');

Route::get('/', function () {
    return view('index');
})->name('homepage');


/**
 * Define a route to handle GET requests to the '/login' URL path.
 * When accessed, it redirects to the route named 'auth.create'.
 * This route is named 'login' for convenient reference in the application.
 */
Route::get('login', fn () => view('auth.create'))->name('login');


// Resourceful route for managing authentications, utilizing the AuthController with relevant actions
Route::resource('auth', AuthController::class)
    ->only(['create', 'store']);

/**
 * Define a route to handle GET requests to the '/logout' URL path.
 * When accessed, it redirects to the route named 'auth.destroy'.
 * This route is named 'logout' for convenient reference in the application.
 */
Route::delete('logout', fn () => to_route('auth.destroy'))->name('logout');

/**
 * Define a route to handle DELETE requests to the '/auth' URL path.
 * Invokes the 'destroy' method of the AuthController.
 * This route is named 'auth.destroy' for convenient reference in the application.
 */
Route::delete('auth', [AuthController::class, 'destroy'])
    ->name('auth.destroy');

// This group of routes is wrapped in middleware to ensure two conditions:
// 1. The user must be authenticated.
// 2. The user must have the 'receptionist' role.
Route::middleware(['auth', 'receptionist'])->prefix('reception')->group(function () {
    // Reception Dashboard
    // Route::get('/dashboard', 'Reception\DashboardController@index')->name('reception.dashboard');

    // Patient Management
    Route::resource('patients', PatientController::class);

    // Doctor Management
    Route::resource('doctors', DoctorController::class);

    // Appointment Management
    Route::resource('appointments', AppointmentController::class);

    Route::get('fetch-doctors/{specializationId}', [AppointmentController::class, 'fetchDoctorsBySpecialization'])
        ->name('appointments.fetch-doctors');

    // Specializations Management
    Route::resource('specializations', SpecializationController::class);
});

// This route is accessible to authenticated users with the 'doctor' role
Route::middleware(['auth', 'doctor'])->prefix('doctors')->group(function () {
    // Add a new route for viewing appointments
    Route::get('{id}/appointments', [DoctorController::class, 'viewAppointments'])
        ->name('doctors.appointments');

    // Add a new route for editing appointments
    Route::get('{doctorId}/appointments/{appointmentId}/edit', [DoctorController::class, 'editAppointment'])
        ->name('doctors.edit-appointment');

    // Add a new route for updating appointments
    Route::put('{doctorId}/appointments/{appointmentId}', [DoctorController::class, 'updateAppointment'])
        ->name('doctors.update-appointment');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/dashboard/appointments-by-specialization', 'DashboardController@getAppointmentsBySpecialization')->name('dashboard.appointments-by-specialization');

