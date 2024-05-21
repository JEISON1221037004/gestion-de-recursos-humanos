<?php
use App\Http\Controllers\API\DepartmentController;
use App\Http\Controllers\API\PositionController;
use App\Http\Controllers\API\EmployeeController;
use App\Http\Controllers\API\SalaryController;
use App\Http\Controllers\API\PerformanceReviewController;

Route::apiResource('departments', DepartmentController::class);
Route::apiResource('positions', PositionController::class);
Route::apiResource('employees', EmployeeController::class);
Route::apiResource('salaries', SalaryController::class);
Route::apiResource('performance-reviews', PerformanceReviewController::class);
