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

		

