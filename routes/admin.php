
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

Auth::routes();
Route::group(['middleware' => ['auth']], function() {
Route::get('/', ['uses' => 'AdminController@Index', 'as' => 'admin.home']);
Route::get('/entrenamientos',['uses'=>'TrainingAdminController@Index','as'=>'admin.entrenamientos']);
Route::get('/entrenamientos/crear',['uses'=>'TrainingAdminController@Create','as'=>'admin.entrenamientos.create']);
Route::post('/entrenamientos/guardar',['uses'=>'TrainingAdminController@Store','as'=>'admin.entrenamientos.store']);
Route::get('/entrenamientos/editar/{training}',['uses'=>'TrainingAdminController@Edit','as'=>'admin.entrenamientos.edit']);
Route::put('/entrenamientos/editar/{training}',['uses'=>'TrainingAdminController@Update','as'=>'admin.entrenamientos.update']);
Route::get('/entrenamientos/eliminar/{id}',['uses'=>'TrainingAdminController@Delete','as'=>'admin.entrenamientos.delete']);
Route::get('/entrenamientos/{training}',['uses'=>'TrainingAdminController@Show','as'=>'admin.entrenamientos.show']);

Route::get('/opiniones',['uses'=>'OpinionController@Index','as'=>'admin.opiniones']);
Route::get('/opiniones/crear',['uses'=>'OpinionController@Create','as'=>'admin.opiniones.create']);
Route::post('/opiniones/guardar',['uses'=>'OpinionController@Store','as'=>'admin.opiniones.store']);
Route::get('/opiniones/editar/{opinion}',['uses'=>'OpinionController@Edit','as'=>'admin.opiniones.edit']);
Route::put('/opiniones/editar/{opinion}',['uses'=>'OpinionController@Update','as'=>'admin.opiniones.update']);
Route::get('/opiniones/eliminar/{id}',['uses'=>'OpinionController@Delete','as'=>'admin.opiniones.delete']);
Route::get('/opiniones/{opinion}',['uses'=>'OpinionController@Show','as'=>'admin.opiniones.show']);
Route::post('opiniones/uploadImage', ['uses' => 'OpinionController@uploadImage', 'as' => 'admin.opiniones.uploadImage']);

Route::get('/colaboradores',['uses'=>'ColaboratorsController@Index','as'=>'admin.colaboradores']);
Route::get('/colaboradores/crear',['uses'=>'ColaboratorsController@Create','as'=>'admin.colaboradores.create']);
Route::post('/colaboradores/guardar',['uses'=>'ColaboratorsController@Store','as'=>'admin.colaboradores.store']);
Route::get('/colaboradores/editar/{colaborador}',['uses'=>'ColaboratorsController@Edit','as'=>'admin.colaboradores.edit']);
Route::put('/colaboradores/editar/{colaborador}',['uses'=>'ColaboratorsController@Update','as'=>'admin.colaboradores.update']);
Route::get('/colaboradores/eliminar/{id}',['uses'=>'ColaboratorsController@Delete','as'=>'admin.colaboradores.delete']);
Route::get('/colaboradores/{colaborador}',['uses'=>'ColaboratorsController@Show','as'=>'admin.colaboradores.show']);

});