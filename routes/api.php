<?php

use App\Http\Controllers\VacplaceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VacdateController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('auth/login', [\App\Http\Controllers\AuthController::class, 'login']);

Route::get('vacdates', [VacdateController::class, 'index']);
Route::get('vacdates/{id}', [VacdateController::class, 'findById']);

Route::get('vacplaces', [VacplaceController::class, 'index']);
Route::get('vacplaces/{id}', [VacplaceController::class, 'findById']);

Route::put('vacdate/registration/{id}', [VacdateController::class, 'registerUser']);

Route::get('user/{id}', [UserController::class, 'getUsersById']);


//Hier alle Routen rein geben, die nur für authentifizierte User zugänglich sein sollen
Route::group(['middleware'=>['api', 'auth.jwt']], function(){
    //create new vacdate
    Route::post('vacdate', [VacdateController::class,'save']);

    //update vacdate
    Route::put('vacdate/{id}', [VacdateController::class, 'update']);

    //delete vacdate
    Route::delete('vacdate/{id}', [VacdateController::class, 'delete']);

    //change vaccination state -> vaccinated
    Route::put('vacdate/user/{user_id}', [UserController::class, 'changeVacState']);

    //logout
    Route::post('auth/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
});
