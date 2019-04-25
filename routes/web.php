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

Route::get('/home', 'HomeController@index')->name('home');
//daily expense
Route::get('/daily_expense', 'ExpenseController@showDailyExpensePage');
Route::post('/daily_expenseSave', 'ExpenseController@getDailyExpense');

//Monthly expense
Route::get('/monthly_expense', 'ExpenseController@showMonthlyExpensePage');
Route::post('/monthly_expenseSave', 'ExpenseController@getMonthlyExpense');

//updating credit
Route::get('/update_credit', 'ExpenseController@showUpdateCreditPage');
Route::post('/update_creditSave', 'ExpenseController@getUpdateCreditPage');
