<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Proyecto empresas
Creo el proyecto nuevo
```shell
laravel new Empresas
```
### Requisitos
#### R1 instalar autenticación

Me ubico dentro del directorio de mi proyecto y ejecuto lo siguiente:

Requiero el paquete de breeze
```shell
 composer require "laravel/breeze"
```
Instalo breeze
```shell
php artisan breeze:install
```

Instalo herramientas del front
```shell
npm install
```

Pongo en funcionamiento el servidor de base de datos cargo el fichero docker-composer.yaml en el directorio del proyecto

[Fichero docker-compose.yaml](./docker-compose.yaml)

Configuro el fichero ***.env*** para configurar la base de datos (ver credenciales en el fichero ***.yaml***)
```shell
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=23511
DB_DATABASE=empresa
DB_USERNAME=aitor
DB_PASSWORD=aitor
```

Levantamos el docker
```
docker compose up -d
```

Ejecuto las migraciones
```shell
php artisan migrate
```

Levantamos el servidor
```shell
php artisan serve &
```
Ponemos en marcha vite
```shell
npm run dev
```




