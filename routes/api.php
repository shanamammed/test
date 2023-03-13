<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('employees', [ApiController::class, 'employees']);
Route::get('getEmployee', [ApiController::class, 'getEmployee']);
Route::get('companies', [ApiController::class, 'companies']);
Route::get('getCompany', [ApiController::class, 'getCompany']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
