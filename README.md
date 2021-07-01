# Mexflix
## Programación para internet.

## Integrantes:

- Edgar González<br>
- Jonathan Medina

---

## Descripción:

   **Mexflix** es una plataforma web de streaming de contenido multimedia que ofrece una gran variedad de peliculas y series de manera gratuita.

   Mexflix no es una pagina convencional que te redirecciona a otros sitios cada minuto, aqui podras encontrar el contenido que deseas ver de manera rápida y sencilla.

   Los administradores de Mexflix podran agregar contenido al catalogo junto con la informacion que requieran, ademas es posible agregar imagenes al contenido para que el usuario pueda apreciar de manera mas grafica el contenido.
Los administradores tambien tendran una amplia cantidad de maneras de manejar la informacion de los contenidos, podran editar la informacion, eliminar el contenido, agregar generos, añadir temporadas a las series y añadir capitulos a cada una de las temporadas.

---

## Instalación:

1. Clonar el proyecto en `C:\laragon\www`: `git clone https://github.com/edgarglezc/Mexflix.git` 
2. Cambiarse al directorio del proyecto: `cd Mexflix`
3. Instalar dependiencias mediante composer: `composer install`
4. Crear archivo de variables de entorno: `cp .env.example .env`
5. Crear llave: `php artisan key:generate`
6. Configurar los datos del mailtrap en el archivo: `.env`
7. Crear la base de datos en tu sistema gestor de bases de datos: `CREATE DATABASE mexflix`
8. Configurar el nombre de la base de datos en el archivo `.env`
9. Link storage: `php artisan storage:link`
10. Configurar nombre de base de datos en _.env_ y ejecutar migraciones: `php artisan migrate`
11. Para datos reales, ejecutar seeds: `php artisan db:seed --class=DatabaseSeeder`
12. Para datos de prueba, ejecutar seeds: `php artisan db:seed --class=TestDatabaseSeeder`
13. Registrar el localhost `127.0.0.1 mexflix.test #laragon magic!` en el archivo `hosts` de Laragon

---

## Cuentas de usuario:

### Admin:
email: admin@mexflix.org<br>
password: 12345678

email: samuel@test.com<br>
password: 12345678

### User:
email: noadmin@mexflix.org<br>
password: 12345678

---
