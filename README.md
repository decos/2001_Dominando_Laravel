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

## Como validar formularios

- Reglas de Validaciones

		- https://laravel.com/docs/8.x/validation#available-validation-rules

- Usar el metodo `validate` en el Controlador para añadir el tipo de validación.

- En Laravel tenemos acceso a la variable `$errors` en todas las vistas

- A traves del metodo `any` validamos si existe algun error

		$ $errors->any()
		
- Para imprimir codigo HTML agregamos en vez de dos llaves, dos signos de admiración. Ejemplo:

		$ {!! $errors->first('name', '<small>:message</small><br>') !!}

- Mantener la información ingresada al formulario a pesar del error

		$ value="{{ old('name') }}"
		$ value="{{ old('email') }}"

## Como traducir tus aplicaciones en Laravel

		- https://github.com/Laravel-Lang/lang

1. Modificar el archivo de configuraciones generales

		- /home/decos/repos/2001_Dominando_Laravel/laravel/config/app.php

2. Modificar el valor del atributo `locale`, por defecto es `en`

		$ 'locale' => 'es',
		
3. Creamos el directorio `es` dentro de `lang`

4. Si no encuentra la traduccion entonces por defecto la buscara dentro del directorio `en` debido a esta regla

		$ 'fallback_locale' => 'en',
		
- Para agregar mensajes de error personalizados, se debera añadir un segundo atributo de tipo Array al metodo `validate`. Ejemplo:

		$ 'name.required' => 'Necesito tu nombre'
		
- Para traducir textos estaticos que se encuentran en la vista debemos hacer lo siguiente:

		$ <h1>{{ __('Contact') }}</h1>
		
- Es importante tener en cuenta las mayusculas y minusculas

1. Añadir un archivo de tipo `json` en el directorio `resources/lang`

		{
		    "Contact"   : "Contacto"
		}

- Tambien podemos usar la directiva `@lang` en la vista. Ejemplo:

		$ @lang('Home')
		
- Tambien se puede setear el lenguaje desde el archivo de rutas

		$ App::setlocale('es');
		
- Tambien se pueden traducir los mensajes de error

		$ 'name.required' => __('I need your name')

## Como enviar emails en Laravel

1. Crear un `mailable`

		$ php artisan make:mail MessageRecieved
		
2. Actualizar la funcón `build` de la clase `MessageRecieved`

3. Añadir una nueva vista con el nombre `message-received` y añadir HTML

4. Actualizar la variable de entorno `MAIL_DRIVER` y asignarle el valor `log`

5. Limpiar el cache cada vez que se modifique el archivo que contiene las variables de entorno

		$ php artisan config:cache
		
6. Revisar el archivo `/laravel/storage/logs/laravel.log` y verificar que se encuentra la información del correo

7. Añadir las variables de entorno `MAIL_FROM_ADDRESS` y `MAIL_FROM_NAME` y asignarle valores

8. Para cambiar el asunto del email, se puede añadir una propiedad en la clase `MessageRecieved`

9. Imprimir la información ingresada por el formularia en el `log`, actualizando el `body` de la vista `message-received`

10. Si deseas visualizar el email en el navegador es retornar una nueva instancia de la clase `mailable`

- Otra forma de visualizar el email es utilizando `Mailtrap`

		https://mailtrap.io/
		
11. Creamos una cuenta (en caso de no tenerla) y de la configuración de la bandeja de entrada obtenemos los siguientes datos:

		- MAIL_USERNAME
		- MAIL_PASSWORD
		- MAIL_ENCRYPTION

12. Modificamos nuevamente la variable de entorno `MAIL_DRIVER` a `smtp`, limpiamos cache y probamos

- Como Enviar emails de verdad ? (producción)

13. Laravel por defecto no soporta `sendgrid`, asi que tendremos que instalarlo agregando la dependencia en el archivo `composer.json` y ejecutando composer update

		- "s-ichikawa/laravel-sendgrid-driver": "~2.0"
		$ composer update
		
14. Crear una cuenta en `SendGrid` y generar un API Key

		- https://app.sendgrid.com/settings/api_keys
		
15. Actualizar el archivo de configuraciones `services.php`

		'sendgrid' => [
			'api_key' => env('SENDGRID_API_KEY'),
		],
		  
16. Para tener una referencia de las variables de entorno de produccion podemos usar `env.example`

		/laravel/.env.example
		
		#Produccion
		#MAIL_DRIVER=sendgrid
		#SENDGRID_API_KEY='YOUR_SENDGRID_API_KEY'
		
## Variables de entorno y bases de datos

- APP_ENV: Define el entorno en el que esta la aplicación. (local, production)
- APP_DEBUG: Para que nos muestre o viceversa los errores. (true, false)

1. Configuración de la base de datos

		DB_CONNECTION=mysql
		DB_HOST=127.0.0.1
		DB_PORT=3306
		DB_DATABASE=laravel
		DB_USERNAME=root
		DB_PASSWORD=password
		
- Si modificas el archivo de entorno, ejecutar lo siguiente:

		`php artisan config:cache`
	
2. Crear la base de datos en mysql

		`CREATE DATABASE laravel;`
	
## Que son y como se utilizan las migraciones

1. Actualizar la migración `database/migrations/2014_10_12_000000_create_users_table.php`

2. Correr las migraciones (métodos UP), ejecutando:

		php artisan migrate
		
- En caso de obtener un error se deberá instalar lo siguiente:

		$ sudo apt install php-mysql

3. Correr las migraciones (métodos DOWN), ejecutando:

		php artisan migrate:rollback

4. Para hacer rollback solo de la última migración, ejecutamos:

		php artisan migrate:rollback --step=1
		
5. Hacer rollback de todas las migraciones y volver a ejecutarlas nuevamente (COMANDO DESTRUCTIVO)

		php artisan migrate:fresh
		
6. Crear una migración

		php artisan make:migration add_phone_to_users_table
		
- vendor/laravel/framework/src/Illuminate/Database/Console/Migrations/TableGuesser.php

7. Crear la tabla de proyectos

		php artisan make:migration create_projects_table
		
- Ejecutar `php artisan migrate:fresh`

## ELOQUENT: Obtener registros de la base de datos

- Una forma de interactuar con la base de datos es utilizando el Query Builder

- La solucion del error `Could not fin driver` al utilizar la clase `DB`, fue reiniciar el proyecto `php artisan serve`

- Laravel trae su propio ORM (Object-Relational Mapping), el cual es `Eloquent`

- Eloquent implementa el patron `Active Record` que usa los metodos `save`, `update`, `delete`

- Crear una clase o entidad que represente la tabla  `projects`

- La convencion para llamar a los modelos es la primera letra en mayuscula y en singular. Ejemplo:

		$ php artisan make:model Project -m
		
	-m : Crea el modelo junto con el archivo migración
		
- En caso de haber más de una palabra usariamos `came case`

		$ php artisan make:model MyProject -m
		
- Creamos el modelo `project`

		$ php artisan make:model Project
		
- Carbon es una excelente libreria para manipular fechas en PHP

		https://carbon.nesbot.com/
		
## ELOQUENT: Obtener registros individuales

- Crear la ruta `PortfolioController@show`
	
		Route::get('/portfolio/{id}', 'PortfolioController@show')->name('portfolio.show');
		
- Crear el metodo `show` en `PortfolioController`

- Restructuración de código

## Route Model Binding - URLs amigables

- Usar Route Model Binding, el permite inyectar la instancia  de un modelo en las rutas

-Sobrecribir el metodo `getRouteKeyName` en la clase `Project`

- Añadir un campo en la tabla `projects`
		
## ELOQUENT: Insertar registros

1. Crear la vista `create.blade.php` en el directorio `projects`

2. Añadimos la ruta para acceder al formulario

		Route::get('/portafolio/crear', 'ProjectController@create')->name('projects.create');
		
- Tener en cuenta la prioridad de rutas

3. Añadir el método `create` en el controlador `Project`
		
4. Añadir el formulario en la vista `create.blade.php`

- NO OLVIDAR AGREGAR EL TOKEN `CSRF` => `@csrf`, dentro del formulario

5. Añadir una nueva ruta para almecanar los datos

		Route::post('/portafolio', 'ProjectController@store')->name('projects.store');
		
6. Añadir el método `store` en el controlador `Project`

7. Aladir la propiedad `fillable` en el modelo `Project`, el cual permitira añadir los campos que se agregaran masivamente

8. Añadir el enlace `Crear proyecto` en la vista `index`

## Que significa la asignación masiva

- Podemos deshabilitar la protección que viene en Laravel siempre y cuando no usemos `request()->all()`

- Añadimos la propiedad `guarded` en el modelo asignandole un arreglo vacío

		protected $guarded = [];
