# 2001_Dominando_Laravel
Aprende a crear aplicaciones robustas y escalables con el framework más popular de PHP, Laravel

# Sección 1: Nivel Principiante

## Crear Proyecto de Laravel

0. Instalar LARAVEL con composer de forma global

		$ composer global require laravel/installer (no lo probe)

1. Instalar composer

2. Crear proyecto de LARAVEL utilizando composer

- Instalar dependencias
	
		$ sudo apt install php7.4-mbstring
		$ sudo apt install php7.4-xml
	
- Crear proyecto en laravel 5.6

		$ composer create-project --prefer-dist laravel/laravel laravel "5.6.*"
	
		$ cd hola_mundo
		$ php artisan serve

- En el browser dirigirse a http://127.0.0.1:8000/
	
- Matar proceso que usa el puerto 8000

		$ sudo kill -9 `sudo lsof -t -i:8000`
		
## Blade, el motor de plantillas de Laravel

- Directiva @extends
- Directiva @yield
- Directiva @section

## Estructuras de control de Blade

- Directiva @foreach
- Directiva @if
- Directiva @isset
- Directiva @forelse
- Imprimir información del LOOP
- Directiva @for
- Directiva @while
- Directiva @switch
		
## Controladores

1. Serie de comandos útiles de Laravel

		$ php artisan
	
2. Ver rutas definidas

		$ php artisan route:list
		$ php artisan r:l
	
3. Crear un nuevo controlador para la vista `portfolio`

		$ php artisan make:controller PortfolioController
	
4. Mostrar comandos de ayuda

		$ php artisan make:controller PortfolioController -h
	
- Por defecto los controladores se crean en el siguiente directorio:

		app\Http\Controllers
	
5. Crear un nuevo controlador para la vista `portfolio` usando la opción `-i`
	
		$ php artisan make:controller PortfolioController -i
	
- Si lo revisamos nos trae un metodo mágico llamado `invoke`

## Controladores Resource y API

0. Comentar la siguiente linea en el archivo `web.php`

1. Crear un nuevo controlador para la vista `portfolio` usando la opción `--resource`

		$ php artisan make:controller PortfolioController --resource
		$ php artisan make:controller PortfolioController -r
		
2. Generar la ruta para listar los proyectos

		$ Route::get('/portfolio', 'PortfolioController@index')->name('portfolio');
		
3. Para generar las 7 rutas para los 7 metodos definidos en el Controlador

		$ Route::resource('projects', 'PortfolioController');
		
4. Mostrar rutas `resource` en consola

		$ php artisan r:l
		
- Metodo `only` filtra las rutas que se deben mostrar

		$ Route::resource('projects', 'PortfolioController')->only(['index', 'show']);
		
- Metodo `except` filtra las rutas que NO se deben mostrar

		$ Route::resource('projects', 'PortfolioController')->except(['index', 'show']);
	
6. Crear un nuevo controlador para la vista `portfolio` usando la opción `--api`

		$ php artisan make:controller PortfolioController --api
		
- La unica diferencia con el controlador `resource` es que excluye los metodos `create` y `edit`

- Asi mismo podemos hacer uso de los metodos `only` y `except`

7. Volvemos a usar el route `resource` (web.php)

		$ Route::resource('proyectos', 'PortfolioController');
		
8. Cambiar los metodos `create` y `edit` si nuestro idioma es español

- Dirigirse al archivo `AppServiceProvider`

- Importar la clase `Route`

		$ use Illuminate\Support\Facades\Route;

- Actualizar el metodo `boot`

		public function boot()
		{
			Route::resourceVerbs([
			    'create' => 'crear',
			    'edit' => 'editar',
			]);
		}

## Activacion de Links de Navegación

- `request()` : Nos devuelve una instancia de la clase Illuminate\Http\Request

- `routeIs` : Verificando el nombre de la ruta

- Los archivos que colocamos dentro de `app`, se cargan solo si son clases. En este caso `helpers.php` es un archivo

- Debemos decirle a composer (que es el manejador de paquetes en PHP) que nos cargue el archivo `helpers.php` para poder utilizarlo en todas partes.

- En la sección `autoload` del archivo `composer.json` se definen los archivos que se van a cargar automaticamente

1. Usar la llave `files`y colocar en el arreglo los archivos que queremos cargar.

2. Debemos decirle a composer que hubo un cambio y que debe compilar el autocargador

		$ composer dumpautoload

- Directiva @include

## Como enviar formularios

1. Añadir un formulario en la vista `contact`

2. Crear una nueva ruta que responda a la URL pero con el metodo POST

		$ Route::post('/contact', 'MessagesController@store');

3. Crear el controlador `MessagesController`

		$ php artisan make:controller MessagesController
		
4. Codear la función `store`

- Error 419: Laravel nos protege automaticamente de ataques XXS o Ataques de suplantación de identidad

- TODOS LOS FORMULARIOS QUE CREEMOS EN LARAVEL DEBERAN TENER UN TOKEN PARA VERIFICAR QUE EL FORMULARIO ES SEGURO

5. Añadir la directiva `@csrf` dentro de los formularios



