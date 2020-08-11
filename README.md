<h3 align="center">Nexurapp</h3>

## Usar Nexurapp

Nexurapp esta desarrollado en Laravel, Php 7.4 y Mysql 8.0

## Pasos a seguir
- Es necesario preparar la Base de datos para la aplicación

### Database
```sql
CREATE DATABASE nexurapp CHARACTER SET utf8 COLLATE utf8_general_ci;
```

```sh
php artisan migrate --seed
```

### Configurar aplicación
En la raíz del proyecto, en el archivo '.env' ingresar los siguientes datos:

```yaml
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nexurapp
DB_USERNAME=root
DB_PASSWORD=rootpassword
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
