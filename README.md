# App de busquedas por coincidencia
> App construida en laravel y vue js para determinar la coincidencia de un nombre dado entre registros de nombres 

## Configuración y requisitos

## Frontend
  - Node js v14.16.0
  - npm  v 6.14.11

## Backend
  - mysql
  - php 7.2.25
  - composer

## Instalación

## Frontend
  - Ejecutar npm install
  - Lanzar aplicacion con npm run serve

## Backend
  - Crear archivo .env con la configuración de la base de datos y con el nombre match-search como nombre de base de datos
    ```
        DB_DATABASE=match-search
    ```
  - Importar el archivo sql ubicado en la carpeta database
  - Ejecutar composer install
  - Ejecutar los comandos : php artisan config:cache , php artisan cache:clear, php artisan jwt:secret 
  - Lanzar servidor con php artisan serve


# Pruebas unitarias

## Frontend
  - Ejecutar npm run test:unit (este es un test para verificar el cambio de una variable booleana para mostrar u ocultar una tabla)

## Backend
 - Ejecutar php artisan test (este es un test par aprobar la ruta api/register la cual se encarga de registrar un nuevo usuario)
