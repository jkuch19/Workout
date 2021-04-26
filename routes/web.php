<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

	Route::get('/workouts', 'WorkoutController@index')->name('workouts');
	Route::post('/workout/{id?}', 'WorkoutController@store');
	Route::get('/workout/{id?}', 'WorkoutController@show');
	Route::post('/workout/delete/{id}', 'WorkoutController@destroy');

	Route::get('/day/{id}', 'HomeController@day')->name('day');

	Route::get('/muscle-group/{id}', 'HomeController@muscleGroup')->name('muscleGroup');


});
