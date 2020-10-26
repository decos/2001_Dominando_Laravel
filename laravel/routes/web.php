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

/* Route::get('/', function () {
return view('welcome');
}); */

// Rutas de Prueba

/* Route::get('/', function () {
return 'Hola desde la pagina de inicio';
});

Route::get('/contacto', function () {
return 'Hola desde la pagina de contacto';
}); */

// Usar parametros en las rutas
// Parametros obligatorios

/* Route::get('saludo/{nombre}', function ($nombre) {
    return 'Saludos ' . $nombre;
}); */

// Parametros opcionales

Route::get('saludo/{nombre?}', function ($nombre = 'Invitado') {
    return 'Saludos ' . $nombre;
});
