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

use App\Notificacion;
use App\Http\Controllers\NotificacionController;

Route::get('/', function () {
    return view('inicio.inicio');
});


Route::get('/login', 'LoginController')->name('login');
Route::post('/login', 'LoginController@authenticate')->name('authenticate');
Route::get('/logout', 'LoginController@logout')->name('logout');


/*   RUTAS USUARIOS */
Route::resource('/usuarios','UsuarioController');
Route::get('/home', function () {
    $notificaciones = Notificacion::where('notificacion.fk_usuario',session('datos')['pk_usuario'])->get();
    session(['noti'=>count($notificaciones)]);
    return view('inicio.home');
});
Route::resource('/notificaciones', 'NotificacionController');
Route::get('/usuarios/solicitante/edit', 'UsuarioController@editSolicitante');
Route::post('/usuarios/solicitante/', 'UsuarioController@updateSolicitante');

//   RUTAS SOLICITUDES
Route::resource('/solicitudes','SolicitudController');

Route::resource('inversiones','InversionController');

