<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/login','API\ApiEmpleadoController@login');


Route::prefix('empleado')->group( function (){
    Route::get('index', 'API\ApiEmpleadoController@index');
    Route::get('show/{id}', 'API\ApiEmpleadoController@show');
    Route::post('registrar', 'API\ApiEmpleadoController@store');
    Route::post('cargarfoto', 'API\ApiEmpleadoController@cargarFoto');
    Route::get('denegar/{id}', 'API\ApiEmpleadoController@denegar');
    Route::get('aprobar/{id}', 'API\ApiEmpleadoController@aprobar');
    Route::get('all', 'API\ApiEmpleadoController@all');
});

Route::prefix('oficio')->group( function (){
    Route::get('index', 'API\ApiOficioController@index');
    Route::get('obtener/{id}', 'API\ApiEmpleadoController@oficioempleado');
});

Route::prefix('horario')->group( function (){
    Route::post('registrar', 'API\ApiHorarioController@store');
});

Route::prefix('trabajo')->group( function (){
    Route::post('registrar', 'API\ApiEmpleadoController@crearTrabajo');
});

