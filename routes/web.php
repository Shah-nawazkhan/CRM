<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/customers', 'App\http\Controllers\CustomerController@index');
Route::get('/customers/create', 'App\http\Controllers\CustomerController@create');
Route::post('/customers', 'App\http\Controllers\CustomerController@store');
Route::get('/customers/{id}', 'App\http\Controllers\CustomerController@show');
Route::get('/customers/{id}/edit', 'App\http\Controllers\CustomerController@edit');
Route::put('/customers/{id}', 'App\http\Controllers\CustomerController@update');
Route::delete('/customers/{id}', 'App\http\Controllers\CustomerController@destroy');
Route::get('/leads', 'App\http\Controllers\LeadController@index');
Route::get('/leads/create', 'App\http\Controllers\LeadController@create');
Route::post('/leads', 'App\http\Controllers\LeadController@store');
Route::get('/leads/{id}', 'App\http\Controllers\LeadController@show');
Route::get('/leads/{id}/edit', 'App\http\Controllers\LeadController@edit');
Route::put('/leads/{id}', 'App\http\Controllers\LeadController@update');
Route::delete('/leads/{id}', 'App\http\Controllers\LeadController@destroy');
