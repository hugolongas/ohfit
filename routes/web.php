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
Route::get('/metodo', ['uses' => 'HomeController@Method', 'as' => 'method']);
Route::get('/equipo', ['uses' => 'HomeController@Team', 'as' => 'team']);
Route::get('/empresas', ['uses' => 'HomeController@Enterprises', 'as' => 'enterprise']);
Route::get('/planes', ['uses' => 'TrainingController@Index', 'as' => 'training']);

Route::get('/politica-privacidad.html', ['uses' => 'HomeController@PoliticaPrivacidad', 'as' => 'politica-privacidad']);
Route::get('/politica-cookies.html', ['uses' => 'HomeController@PoliticaCookie', 'as' => 'politica-cookies']);
/*Servicios*/
Route::get('/servicios', ['uses' => 'ServiceController@Index', 'as' => 'services']);


/*Entrenamientos*/
Route::get('/planes/{training}', ['uses' => 'TrainingController@TrainingForm', 'as' => 'trainingform']);
Route::post('/planes/entreno', ['uses' => 'TrainingController@TrainingPay', 'as' => 'trainingStoreform']);
Route::get('/planes/completado/{idForm}',['uses'=>'TrainingController@complete','as'=>'trainingComplete']);
Route::get('/completado', ['uses' => 'HomeController@complete', 'as' => 'home-complete']);

/*Formulario contacto*/
Route::post('/contacto', ['uses' => 'HomeController@SendContact', 'as' => 'contact.send']);
Route::post('/contacto-empresa', ['uses' => 'HomeController@SendContactEnterprise', 'as' => 'contactentErprise.send']);
Route::get('/solicitarInformacion', ['uses' => 'SolicitudController@WebIndex', 'as' => 'info']);
Route::post('/solicitarInformacion', ['uses' => 'SolicitudController@SendInfo', 'as' => 'info.send']);
/*otros*/
Route::get('/clear/route', 'ConfigController@clearRoute');