<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\ShiftController;

Route::get('/', function () {
    return view('welcome');
});

Route::get(
    '/admin',
    'App\Http\Controllers\Admin\AdminHomeController@index'
)
    ->name("admin.home.index");

//Employees//
Route::get('/admin/employees', [EmployeeController::class, 'index'])
    ->name('admin.employees.index');
Route::post('/admin/employees', [EmployeeController::class, 'store'])
    ->name('admin.employees.store');
Route::get('/admin/employees/{businessEntityID}/view', [EmployeeController::class, 'view'])
    ->name('admin.employees.view');
Route::delete('/admin/employees/{businessEntityID}', [EmployeeController::class, 'destroy'])
    ->name('admin.employees.destroy');
Route::get('/admin/employees/{businessEntityID}/edit', [EmployeeController::class, 'edit'])
    ->name('admin.employees.edit');
Route::put('/admin/employees/{businessEntityID}', [EmployeeController::class, 'update'])
    ->name('admin.employees.update');
// Departments//
Route::get('/admin/departments', [DepartmentController::class, 'index'])
    ->name('admin.departments.index');
Route::get('/admin/departments/create', [DepartmentController::class, 'create'])
    ->name('admin.departments.create');
Route::post('/admin/departments', [DepartmentController::class, 'store'])
    ->name('admin.departments.store');
Route::get('/admin/departments/{department}/edit', [DepartmentController::class, 'edit'])
    ->name('admin.departments.edit');
Route::put('/admin/departments/{department}', [DepartmentController::class, 'update'])
    ->name('admin.departments.update');
Route::delete('/admin/departments/{department}', [DepartmentController::class, 'destroy'])
    ->name('admin.departments.destroy');
Route::get('/admin/departments/{department}/employees', [DepartmentController::class, 'employees'])
    ->name('admin.departments.employees');

// Shifts
Route::get('/admin/shifts', [ShiftController::class, 'index'])
    ->name('admin.shifts.index');
Route::get('/admin/shifts/create', [ShiftController::class, 'create'])
    ->name('admin.shifts.create');
    Route::post('/admin/shifts', [ShiftController::class, 'store'])
    ->name('admin.shifts.store');
Route::get('/admin/shifts/{shift}/edit', [ShiftController::class, 'edit'])
    ->name('admin.shifts.edit');
Route::put('/admin/shifts/{shift}', [ShiftController::class, 'update'])
    ->name('admin.shifts.update');
Route::get('/admin/shifts/{shift}', [ShiftController::class, 'show'])
    ->name('admin.shifts.show');
Route::delete('/admin/shifts/{shift}', [ShiftController::class, 'destroy'])
    ->name('admin.shifts.destroy');
