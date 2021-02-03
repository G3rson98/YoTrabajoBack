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


//Auth::routes();

Route::get('/dashboard','HomeController@index')->name('dashboard');
Route::get('/','Auth\LoginController@showLoginForm')->name('showlogin');
Route::post('/login','Auth\LoginController@login')->name('login');
Route::post('/logout','Auth\LoginController@logout')->name('logout');


Route::get('/tabla', function () {
    return view('dashboard.table');
});


Route::prefix('sancion')->group( function (){
    Route::get('index', 'SancionController@index')->name('sancion.index');
    Route::get('create/{id}', 'SancionController@create')->name('sancion.create');
    Route::post('store', 'SancionController@store')->name('sancion.store');    
});
Route::prefix('empleado')->group( function (){
    Route::get('index', 'EmpleadoController@index')->name('empleado.index');
    Route::get('destroy/{id}', 'EmpleadoController@destroy')->name('empleado.destroy');    
});
