# api-paraguayos
API que consume datos de los paraguayos que se encuentran en áreas referentes a la tecnología.

# Tecnologías utilizadas (Toolkit)

- [PHP 7.2 (Laravel 6.2.xx)](https://laravel.com/docs)
- [Composer 1.10.22](https://getcomposer.org/download/)
- MySQL 5.7

# Desarrollo

## Instalación

```bash
git clone git@github.com:josego85/api-paraguayos.git
sudo chown -R $USER:www-data ./api-paraguayos
cd api-paraguayos
composer install 
cp .env.example .env
php artisan key:generate
php artisan serve 
```

## Base de datos

```bash
mysql -u root -p
CREATE DATABASE paraguayans CHARACTER SET utf8 COLLATE utf8_general_ci;
GRANT ALL PRIVILEGES ON paraguayans.* TO paraguayans@'localhost' IDENTIFIED BY 'xxxxxxxxxxxxx';
FLUSH PRIVILEGES;
exit
```

## Permisos

```bash
sudo chown -R $USER:www-data storage
sudo chown -R $USER:www-data bootstrap/cache
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```