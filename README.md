<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Sistema de Gestión de Recursos Humanos - Backend

Este es el repositorio del backend para el Sistema de Gestión de Recursos Humanos, desarrollado utilizando Laravel 11.

## Descripción del Proyecto

El Sistema de Gestión de Recursos Humanos es una aplicación que permite la gestión de empleados, departamentos, posiciones, salarios y evaluaciones de desempeño.

## Requisitos

- PHP 7.4 o superior
- Composer
- MySQL

## Instalación

1. Clona este repositorio en tu máquina local.
2. Ejecuta `composer install` para instalar las dependencias de Laravel.
3. Crea una copia del archivo `.env.example` y nómbralo `.env`. Configura tu base de datos y otros parámetros de entorno en este archivo.
4. Ejecuta `php artisan key:generate` para generar la clave de la aplicación.
5. Ejecuta `php artisan migrate` para ejecutar las migraciones y crear las tablas en la base de datos.
6. Ejecuta `php artisan serve` para iniciar el servidor de desarrollo.

## Uso

Este backend proporciona una API RESTful para interactuar con el frontend. Puedes realizar peticiones HTTP a las siguientes rutas:

- `/api/employees`: Gestión de empleados
- `/api/departments`: Gestión de departamentos
- `/api/positions`: Gestión de posiciones
- `/api/salaries`: Gestión de salarios
- `/api/performance-reviews`: Gestión de evaluaciones de desempeño

Para obtener más detalles sobre las rutas y los controladores, consulta el código fuente.

## Contribución

Si deseas contribuir a este proyecto, sigue estos pasos:

1. Haz un fork del repositorio.
2. Crea una nueva rama (`git checkout -b feature/nueva-caracteristica`).
3. Realiza tus cambios y haz commit (`git commit -am 'Agrega nueva característica'`).
4. Haz push a la rama (`git push origin feature/nueva-caracteristica`).
5. Crea un nuevo Pull Request.
