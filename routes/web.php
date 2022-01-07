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
    return view('pages.index');
});





Route::get('/cashglobal', function () {
    return view('GlobalNet.report');
})->middleware('auth');
Route::get('/derivativesglobal', function () {
    return view('GlobalDerivative.report');
})->middleware('auth');


// admin side
Route::get('/admin', function () {
    return view('home');
});
//Financial Year
Route::post('/fyear/store', 'FinancialYearController@fyearstore')->middleware('auth');
Route::get('/setfinancialyear', 'FinancialYearController@showfyear')->middleware('auth');
Route::post('/deletefinancialyear/{id}', 'FinancialYearController@deletefyear')->middleware('auth');

//Financial Statement
Route::get('/importstatement', 'FinancialStatementController@showadmin')->middleware('auth');
Route::post('/report/store', 'FinancialStatementController@store')->middleware('auth');
Route::get('/financialstatement', 'FinancialStatementController@showclient')->middleware('auth');

//Global Derivatives
Route::any('/importnet', [\App\Http\Controllers\ClientGlobalController::class,'showGlobal'])->name('showGlobal')->middleware('auth');
Route::any('/importderivative', [\App\Http\Controllers\GlobalNetPositionController::class,'showGlobalDerivative'])->name('showGlobalDerivative')->middleware('auth');


Route::post('/globalnet/store', 'GlobalNetPositionController@store')->middleware('auth');

Route::post('/globalderivative/store', 'ClientGlobalController@store')->middleware('auth');

Route::get('/showusers', [\App\Http\Controllers\UserController\UserController::class, 'showusers'])->name('showusers')->middleware('auth');
Route::get('/adduser', [\App\Http\Controllers\UserController\UserController::class, 'adduser'])->name('adduser')->middleware('auth');
Route::any('/adduseraction', [\App\Http\Controllers\UserController\UserController::class, 'adduseraction'])->name('adduseraction')->middleware('auth');
Route::any('/updateStatus/{id?}', [\App\Http\Controllers\UserController\UserController::class, 'updateStatus'])->name('updateStatus')->middleware('auth');
Route::any('/edituser/{id?}', [\App\Http\Controllers\UserController\UserController::class, 'editUser'])->name('editUser')->middleware('auth');
Route::any('/deleteUserAction/{id?}', [\App\Http\Controllers\UserController\UserController::class, 'deleteUserAction'])->name('deleteUserAction')->middleware('auth');
Route::any('/editUserAction', [\App\Http\Controllers\UserController\UserController::class, 'editUserAction'])->name('editUserAction')->middleware('auth');


//search
Route::get('/search', 'SearchController@search')->middleware('auth');
Route::get('/searchderi', 'SearchController@searchderi')->middleware('auth');
Route::get('/searchnet', 'SearchController@searchnet')->middleware('auth');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
