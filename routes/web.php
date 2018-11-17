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
    return view('inicio.inicio');
});


Route::get('/login', 'LoginController')->name('login');
Route::post('/login', 'LoginController@authenticate')->name('authenticate');
Route::get('/logout', 'LoginController@logout')->name('logout');


/*   RUTAS USUARIOS */
Route::resource('/usuarios','UsuarioController');
Route::resource('/notificaciones', 'NotificacionController');
Route::get('/usuarios/solicitante/edit', 'UsuarioController@editSolicitante');
Route::post('/usuarios/solicitante/', 'UsuarioController@updateSolicitante');
Route::get('/perfil', function () {
    return view('inicio.perfil');
});

//   RUTAS SOLICITUDES
Route::resource('/solicitudes','SolicitudController');
Route::get('/home','SolicitudController@mostrarS');

Route::resource('inversiones','InversionController');

Route::post('/aceptar/{pk}','SolicitudController@confirmacion');


