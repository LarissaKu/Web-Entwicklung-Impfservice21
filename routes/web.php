<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Models\Vacdate;

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
    //return view('welcome')->with('name','Larissa'); //only for one variable
    $vacdates = DB::table('vacdates')->get();
    //return $vacdates;
    return view('welcome', compact('vacdates'));
});

Route::get('/vacdates/', function () {
    $vacdates = Vacdate::all();
    return view('vacdates.index', compact('vacdates'));
});

Route::get('/vacdates/{id}', function ($id) {
    $vacdate = Vacdate::find($id);
    return view('vacdates.show', compact('vacdate'));
});
