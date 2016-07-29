# Laravel ExcelRud
[ ![Codeship Status for pedsmoreira/laravel-excel-rud](https://codeship.com/projects/b8d390a0-37dc-0134-9c79-460717981076/status?branch=master)](https://codeship.com/projects/165889)

[Laravel-ExcelRud application](https://github.com/pedsmoreira/laravel-excel-rud)

## Setup

- Install composer
https://getcomposer.org/

- Download composer dependencies

    `composer install`

- Create app key

    `php artisan key:generate`

- Configure database
    - Copy the .env.example file to .env and configure your environment variables
        - APP_URL
        - DB_* variables
    
- Create tables and seed

    `php artisan migrate:refresh --seed`
     
## Architecture
This project uses the default Laravel architecture. For more information, please check the [laravel website](https://laravel.com).

## Running Application
- Serve

    `php artisan serve`

## Running Tests
- Refresh database (recommended)

    `php artisan migrate:refresh --seed`

- Run PHPUnit

    `vendor/bin/phpunit`

## Useful links
- Laravel: https://laravel.com
