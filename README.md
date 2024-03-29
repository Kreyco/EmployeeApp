<h3 align="center">EmployeeApp</h3>

## Usar EmployeeApp

EmployeeApp esta desarrollado en Laravel 7, Php 7.4 y Mysql 8.0

## Pasos a seguir
- Es necesario preparar la Base de datos para la aplicación

### Configurar aplicación
En la raíz del proyecto, en el archivo '.env' ingresar los siguientes datos:

```yaml
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=employeeapp
DB_USERNAME=employeeapp
DB_PASSWORD=employeeapppassword

APP_LOCALE=es
```

### Database
```sql
CREATE DATABASE employeeapp CHARACTER SET utf8 COLLATE utf8_general_ci;
```
Si es la primer vez que se crea la base de datos:
```sh
php artisan migrate --seed
```
En caso tal, de haber creado con anterioridad la base de datos, es necesario refrescarla por completo:
```sh
php artisan migrate:fresh --seed
```

## Instalar dependencias
Es necesario ejecutar desde la raíz del proyecto los siguientes comandos:

```sh
composer install
npm install
```

## Levantar la aplicación
```sh
php artisan serve
```

## License
[MIT license](https://opensource.org/licenses/MIT).
