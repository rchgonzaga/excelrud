# Laravel ExcelRud

[Laravel-ExcelRud application](https://github.com/pedsmoreira/laravel-excel-rud)

## Setup

- Install composer
https://getcomposer.org/

- Download composer dependencies

    `composer install`

- Configure database
    - Copy the .env.example file to .env and configure your environment variables
        - APP_URL
        - DB_* variables
    
- Create tables and seed

    `php artisan migrate:refresh --seed`
     
## Architecture
This project uses the default Laravel architecture. For more information, please check the [laravel website](https://laravel.com).

## Running Tests
- Refresh database (recommended)

    `php artisan migrate:refresh --seed`

- Run PHPUnit

    `vendor/bin/phpunit`

## Useful links
- Laravel: https://laravel.com
