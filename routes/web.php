<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\SalaryController;

// Halaman Beranda
Route::get('/', function () {
    return view('home');
})->name('home');

// Resource route untuk Departemen
Route::resource('departments', DepartmentController::class);

// Resource route untuk Jabatan
Route::resource('positions', PositionController::class);

// Resource route untuk Pegawai
Route::resource('employees', EmployeeController::class);

// Resource route untuk Absensi
Route::resource('attendance', AttendanceController::class);

// Resource route untuk Gaji
Route::resource('salaries', SalaryController::class);