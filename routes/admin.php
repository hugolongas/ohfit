
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
Route::group(['middleware' => ['auth']], function () {
    Route::get('/', ['uses' => 'AdminController@Index', 'as' => 'admin.home']);
    Route::group(['middleware' => ['role:admin']], function () {        
        Route::get('/planes', ['uses' => 'TrainingAdminController@Index', 'as' => 'admin.entrenamientos']);
        Route::get('/planes/crear', ['uses' => 'TrainingAdminController@Create', 'as' => 'admin.entrenamientos.create']);
        Route::post('/planes/guardar', ['uses' => 'TrainingAdminController@Store', 'as' => 'admin.entrenamientos.store']);
        Route::get('/planes/editar/{training}', ['uses' => 'TrainingAdminController@Edit', 'as' => 'admin.entrenamientos.edit']);
        Route::put('/planes/editar/{training}', ['uses' => 'TrainingAdminController@Update', 'as' => 'admin.entrenamientos.update']);
        Route::post('/planes/eliminar/{id}', ['uses' => 'TrainingAdminController@Delete', 'as' => 'admin.entrenamientos.delete']);
        Route::get('/planes/{training}', ['uses' => 'TrainingAdminController@Show', 'as' => 'admin.entrenamientos.show']);

        Route::get('/opiniones', ['uses' => 'OpinionController@Index', 'as' => 'admin.opiniones']);
        Route::get('/opiniones/crear', ['uses' => 'OpinionController@Create', 'as' => 'admin.opiniones.create']);
        Route::post('/opiniones/guardar', ['uses' => 'OpinionController@Store', 'as' => 'admin.opiniones.store']);
        Route::get('/opiniones/editar/{opinion}', ['uses' => 'OpinionController@Edit', 'as' => 'admin.opiniones.edit']);
        Route::put('/opiniones/editar/{opinion}', ['uses' => 'OpinionController@Update', 'as' => 'admin.opiniones.update']);
        Route::post('/opiniones/eliminar/{id}', ['uses' => 'OpinionController@Delete', 'as' => 'admin.opiniones.delete']);
        Route::get('/opiniones/{opinion}', ['uses' => 'OpinionController@Show', 'as' => 'admin.opiniones.show']);
        Route::post('opiniones/uploadImage', ['uses' => 'OpinionController@uploadImage', 'as' => 'admin.opiniones.uploadImage']);

        //Servicios
        Route::get('/servicios', ['uses' => 'ServiceController@IndexAdmin', 'as' => 'admin.servicios']);
        Route::get('/servicios/crear', ['uses' => 'ServiceController@Create', 'as' => 'admin.servicios.create']);
        Route::post('/servicios/guardar', ['uses' => 'ServiceController@Store', 'as' => 'admin.servicios.store']);
        Route::get('/servicios/editar/{service}', ['uses' => 'ServiceController@Edit', 'as' => 'admin.servicios.edit']);
        Route::put('/servicios/editar/{service}', ['uses' => 'ServiceController@Update', 'as' => 'admin.servicios.update']);
        Route::post('/servicios/eliminar/{id}', ['uses' => 'ServiceController@Delete', 'as' => 'admin.servicios.delete']);
        Route::get('/servicios/{service}', ['uses' => 'ServiceController@Show', 'as' => 'admin.servicios.show']);
        Route::post('servicios/uploadImage', ['uses' => 'ServiceController@uploadImage', 'as' => 'admin.servicios.uploadImage']);

        Route::get('/colaboradores', ['uses' => 'ColaboratorsController@Index', 'as' => 'admin.colaboradores']);
        Route::get('/colaboradores/crear', ['uses' => 'ColaboratorsController@Create', 'as' => 'admin.colaboradores.create']);
        Route::post('/colaboradores/guardar', ['uses' => 'ColaboratorsController@Store', 'as' => 'admin.colaboradores.store']);
        Route::get('/colaboradores/editar/{colaborador}', ['uses' => 'ColaboratorsController@Edit', 'as' => 'admin.colaboradores.edit']);
        Route::put('/colaboradores/editar/{colaborador}', ['uses' => 'ColaboratorsController@Update', 'as' => 'admin.colaboradores.update']);
        Route::post('/colaboradores/eliminar/{id}', ['uses' => 'ColaboratorsController@Delete', 'as' => 'admin.colaboradores.delete']);
        Route::get('/colaboradores/{colaborador}', ['uses' => 'ColaboratorsController@Show', 'as' => 'admin.colaboradores.show']);
    });
    
    Route::group(['middleware' => ['role:admin;vivagym']], function () {
        Route::get('/solicitudes', ['uses' => 'SolicitudController@Index', 'as' => 'admin.solicitudes']);
        Route::get('/solicitudes/reponder/{solicitud}', ['uses' => 'SolicitudController@Reply', 'as' => 'admin.solicitudes.reply']);
        Route::put('/solicitudes/reponder/{solicitud}', ['uses' => 'SolicitudController@sendReply', 'as' => 'admin.solicitudes.replySend']);
        Route::get('/solicitudes/{solicitud}', ['uses' => 'SolicitudController@Show', 'as' => 'admin.solicitudes.show']);
    });
    
});
