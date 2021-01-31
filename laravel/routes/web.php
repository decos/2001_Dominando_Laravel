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

/* Route::get('saludo/{nombre?}', function ($nombre = 'Invitado') {
return 'Saludos ' . $nombre;
}); */

// Rutas con nombre

/* Route::get('contactame', function () {
    return 'Seccion de contactos';
})->name('contactos');

Route::get('/', function () {
    echo "<a href='" . route('contactos') . "'>Contactos 1</a><br>";
    echo "<a href='" . route('contactos') . "'>Contactos 2</a><br>";
    echo "<a href='" . route('contactos') . "'>Contactos 3</a><br>";
    echo "<a href='" . route('contactos') . "'>Contactos 4</a><br>";
    echo "<a href='" . route('contactos') . "'>Contactos 5</a><br>";
}); */

// Llamar una vista desde una ruta

/* Route::get('/', function () {
    return view('home');
}); */

// Pasar parametros desde una ruta a una vista

/* Route::get('/', function () {
    $nombre = "Diego";
    // return view('home')->with('nombre', $nombre);

    // Otra forma es a traves de un arreglo
    // return view('home')->with(['nombre' => $nombre]);

    // Otra forma es atraves de un arreglo y sin usar with
    // return view('home', ['nombre' => $nombre]);

    // O tambien usando la funcion "compact"
    // siempre y cuando tenga el mismo nombre de la variable
    return view('home', compact('nombre')); // ['nombre' => $nombre]
}); */

// Otra forma de llamar a la vista "home"
/* Route::view('/', 'home'); */

// Se le puede pasar un arreglo de la siguiente manera
// Bastante usado en paginas que no requieren pasar mucha información
/* Route::view('/', 'home', ['nombre' => 'Diego']); */

/* $portfolio = [
    ['title' => 'Proyecto #1'],
    ['title' => 'Proyecto #2'],
    ['title' => 'Proyecto #3'],
    ['title' => 'Proyecto #4'],
]; */

// Tambien se puede setear el lenguaje desde el archivo de rutas
// App::setlocale('es');

// Se le puede asignar un nombre
Route::view('/', 'home')->name('home');
Route::view('/quienes-somos', 'about')->name('about');

// 7 RUTAS REST
// prefijo de la URL + controlador + prefijo del nombre
// Priorizar el orden de las rutas

Route::resource('portafolio', 'ProjectController')
    ->parameters(['portafolio' => 'project'])
    ->names('projects');

// Route::view('/portfolio', 'portfolio', compact('portfolio'))->name('portfolio');

/* Route::get('/portafolio', 'ProjectController@index')->name('projects.index');
Route::get('/portafolio/crear', 'ProjectController@create')->name('projects.create');
Route::get('/portafolio/{project}/editar', 'ProjectController@edit')->name('projects.edit');
Route::post('/portafolio', 'ProjectController@store')->name('projects.store');
Route::patch('/portafolio/{project}', 'ProjectController@update')->name('projects.update');
Route::get('/portafolio/{project}', 'ProjectController@show')->name('projects.show');
Route::delete('/portafolio/{project}', 'ProjectController@destroy')->name('projects.destroy'); */

// Route::resource('projects', 'PortfolioController')->except(['index', 'show']);
// Route::resource('proyectos', 'PortfolioController');

Route::view('/contacto', 'contact')->name('contact');
Route::post('contact', 'MessageController@store')->name('messages.store');

// Por defecto se añade esta ruta
// Auth::routes();

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes... removed!
// Route::get('register', 'Auth\LoginController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\ResetPasswordController@register');

// Password Reset Routes...
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

