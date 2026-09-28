<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;


// Home
Route::get('/', function () {
    return view('welcome');
});


// Home Page
Route::get('/home', function () {
    return view('home');
});


// --- EMPLOYEE ROUTES ---

// Employee List / Table View
Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');

// Add Employee Form
Route::get('/add_employee', [EmployeeController::class, 'create'])->name('employees.create');

// Save Employee
Route::post('/add_employee', [EmployeeController::class, 'store'])->name('employees.store');

// Edit Employee Form
Route::get('/employee/edit/{id}', [EmployeeController::class, 'edit'])->name('employees.edit');

// Update Employee
Route::put('/employee/update/{id}', [EmployeeController::class, 'update'])->name('employees.update');

// Delete Employee 
Route::match(['get', 'delete'], '/employee/delete/{id}', [EmployeeController::class, 'destroy'])->name
('employees.destroy');

// -----------------------


// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Profile
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});


require __DIR__.'/auth.php';