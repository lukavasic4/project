<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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
Route::get('/login','App\Http\Controllers\LoginController@login');

Route::post('/login','App\Http\Controllers\AuthController@doLogin');
Route::get('/admin','App\Http\Controllers\AdminController@adminPage')->middleware('AdminMiddleware');
Route::get("/logout", "App\Http\Controllers\AuthController@logout");
Route::get("/home", "App\Http\Controllers\PageController@home")->middleware('isLoggedIn');

