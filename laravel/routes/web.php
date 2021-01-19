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

$portfolio = [
    ['title' => 'Proyecto #1'],
    ['title' => 'Proyecto #2'],
    ['title' => 'Proyecto #3'],
    ['title' => 'Proyecto #4'],
];

// Se le puede asignar un nombre
Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/portfolio', 'portfolio', compact('portfolio'))->name('portfolio');
Route::view('/contact', 'contact')->name('contact');
