<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VacdateController;

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

Route::get('vacdates', [VacdateController::class, 'index']);
Route::get('vacdate/{id}', [VacdateController::class, 'findById']);

//create new vacdate
Route::post('vacdate', [VacdateController::class,'save']);


//update vacdate
Route::put('vacdate/{id}', [VacdateController::class, 'update']);

Route::delete('vacdate/{id}', [VacdateController::class, 'delete']);


//add users to vacdate

//update user dose
//get all users - um alle anzeigen zu lassen
//get user by id - für login -> user anzeigen zu impfung

//login /logout
