<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::post('/employees', [EmployeeController::class, 'store'])->name('api.employees.store');



?>