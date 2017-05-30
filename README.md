Ionic Facebook App
==================

Este proyecto contiene dos aplicaciones:

 1. Proyecto en Ionic 2 con implementación de Login/Registro de Facebook
 2. Proyecto en Laravel 5 con un web services con la api necesaria para que la aplicación de Ionic 2 funcione correctamente

## Inicialización del proyecto Laravel ##

En primer lugar hay que descargarse las dependencias del proyecto

    composer update

Copiar el archivo .env.example, renombrarlo como .env y configurar la conexión a la base de datos y el APP_KEY

Ejecutar los siguientes comandos para crear y poblar las tablas de la base de datos

    php artisan migrate
    php artisan db:seed


## Inicialización del proyecto Ionic 2 ##

En primer lugar hay que descargarse las dependencias del proyecto

    npm install
    
En segundo lugar, en el archivo pages/login.ts hay que cambiar 'APP-ID' por el id de vuestra aplicación de Facebook



Por último para correr el proyecto hay que ejecutar el comando

    ionic serve


## Funcionalidad ##

La pantalla principal debe contener un botón de login/registro con Facebook.
Cuando se presiona el botón debe de aparecer un pop-up para realizar la autenticación con Facebook.
Al completar la autenticación debe aparecer otra pantalla con el mensaje "Facebook Login. Congratulation you have been logged with Facebook".
Además debe aparecer un botón en la esquina superior izquierda para abrir el menú lateral en el que debe aparecer la imagen de perfil, nombre, apellido e email de la cuenta de Facebook con la que se ha realizado la autenticación.
 