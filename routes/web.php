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

Route::get('/','PagesController@index'); 
Route::get('/about','PagesController@about'); 
Route::get('/services','PagesController@services');

Route::resource('tickets', 'TicketsController');

Auth::routes();
Route::get('/home', 'TicketsController@index');
Route::get('/my_ticket', 'HomeController@my_ticket');

Route::get('/admin', 'HomeController@index');
Route::post('/admin/{id}/tickets', 'HomeController@tickets');
Route::get('/admin/{id}/treated_tickets', 'HomeController@show');
