<?php

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
// for users|students
Route::get('/home', 'HomeController@index')->name('home');
Route::post('custom/register','UserController@register');
Route::post('custom/login','UserController@login');
Route::get('/get_loan',function () {
    return view('loan');
});
Route::post('loan','LoanController@getLoan');
Route::get('history','LoanController@history');
Route::get('total_debt','LoanController@total_debt');


//for admin|banks|heslb
Route::get('/admin/dashboard', 'AdminController@index')->name('admin/dashboard');
Route::get('/admin/payments', 'AdminController@payments')->name('admin/payments');
