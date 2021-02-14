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

Route::get('/', ['uses' => 'HomeController@Index', 'as' => 'home']);
Route::get('/politica-privacidad.html', ['uses' => 'HomeController@PoliticaPrivacidad', 'as' => 'politica-privacidad']);
Route::get('/politica-cookies.html', ['uses' => 'HomeController@PoliticaCookie', 'as' => 'politica-cookies']);
Route::get('/entrenamientos', ['uses' => 'TrainingController@Index', 'as' => 'training']);
Route::post('/contacto', ['uses' => 'HomeController@SendContact', 'as' => 'contact.send']);
Route::get('/entrenamientos/{training}', ['uses' => 'TrainingController@TrainingForm', 'as' => 'trainingform']);
Route::post('/entrenamientos/entreno', ['uses' => 'TrainingController@TrainingPay', 'as' => 'trainingStoreform']);
Route::get('/entrenamientos/completado/{idForm}',['uses'=>'TrainingController@complete','as'=>'trainingComplete']);
Route::get('/completado', ['uses' => 'HomeController@complete', 'as' => 'home-complete']);
Route::get('/clear/route', 'ConfigController@clearRoute');

Route::get('/solicitarInformacion', ['uses' => 'SolicitudController@WebIndex', 'as' => 'info']);
Route::post('/solicitarInformacion', ['uses' => 'SolicitudController@SendInfo', 'as' => 'info.send']);