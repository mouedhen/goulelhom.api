# Goulel'Hom API

APIs services pour l'application Goulel'Hom.

## Installation

## Deployment

> SE : Debian 9 (Stretch)

### Install system dependencies

* Installation du serveur DNS

> Bind9

* Installation du serveur Web

> Apache2

* Installation du serveur de base de données

> MariaDB

Le serveur de base de données mariaDB ne supporte le format JSON qu'a partir de sa version 10.2.7, la version présente 
par défaut dans les mirroir debian est la version 10.1, donc, il faudrait d'abord ajouter les mirroir mariaDB :

```bash
sudo apt-get install software-properties-common dirmngr
sudo apt-key adv --recv-keys --keyserver keyserver.ubuntu.com 0xF1656F24C74CD1D8
sudo add-apt-repository 'deb [arch=amd64,i386,ppc64el] http://ftp.wa.co.za/pub/mariadb/repo/10.2/debian stretch main'
```

Ensuite l'installer, et le configurer

```bash
sudo apt-get update
sudo apt-get install mariadb-server
# TODO Secure and configure the server
```

* Install RabbitMQ

* Install Elastic Stack

* Install application dependencies

    * install redis (cache handler)

    * install spatie/laravel-medialibrary dependencies

```bash
sudo apt-get install libgd-dev imagemagick ghostscript ffmpeg # to generate thumb
sudo apt-get install jpegoptim
sudo apt-get install optipng
sudo apt-get install pngquant
sudo npm install -g svgo
sudo apt-get install gifsicle
```

### Install the application

```bash
git clone #
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan passport:install
php artisan migrate
php artisan db:seed
php artisan storage:link
```

### Add cron jobs

```bash
# Cron jobs
```

## Third party packages

- [x] laravel/passport (LICENSE: MIT) : Laravel Passport is an OAuth2 server and API authentication package that is simple and enjoyable to use.
- [x] barryvdh/laravel-cors (LICENSE: MIT) : Adds CORS (Cross-Origin Resource Sharing) headers support in your Laravel application.
- [x] webpatser/laravel-uuid (LICENSE: MIT) : Laravel package to generate and to validate a UUID according to the RFC 4122 standard. Only support for version 1, 3, 4 and 5 UUID are built-in.
- [x] spatie/laravel-activitylog (LICENSE: MIT) : Log activity inside your Laravel app.
- [x] ybr-nx/laravel-mariadb (LICENSE: MIT) : Add MariaDB JSON support to Laravel. Requires at least MariaDB 10.2.3 (and 10.2.7 to use ->json() migrations).
- [x] spatie/laravel-medialibrary (LICENSE: MIT) : Associate files with Eloquent models.
- [x] spatie/laravel-translatable (LICENSE: MIT) : Making Eloquent models translatable.
- [x] codezero/laravel-unique-translation (LICENSE: MIT) : Check if a translated value in a JSON column is unique in the database.
- [x] spatie/laravel-collection-macros (LICENSE: MIT) : A set of useful Laravel collection macros.
- [x] zizaco/entrust (LICENSE: MIT) : Role-based Permissions for Laravel 5.
- [ ] spatie/laravel-feed (LICENSE: MIT)
- [ ] maatwebsite/excel (LICENSE: MIT)
- [ ] spatie/laravel-backup (LICENSE: MIT)

## Modules

* Gestion des Utilisateurs et des rôles

