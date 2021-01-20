# 2001_Dominando_Laravel
Aprende a crear aplicaciones robustas y escalables con el framework más popular de PHP, Laravel

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



