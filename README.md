## About this project

This is my first larger scale project, it is a website platform for selling games 
written in php using the laravel framework.

## Features

- admin account and admin panel
- manager account and manager panel
- comments
- review scores
- user library 

## Installation

In the .env file set the database that should be used and run the following comamnds:

- composer install
- php artisan key:generate
- php artisan migrate
- php artisan db:seed
- php artisan serve

The seeder generates 5 accounts:
- Admin account
  - email: admin@admin.com
  - password: root
- Manager account
  - email: manager@manager.com
  - password: root
- User accounts
  - email: user1@user.com ; password: 1
  - email: user2@user.com ; password: 12
  - email: user3@user.com ; password: 123
  
## This project uses:
- composer
- Laravel 8
- Laravel 8 jetstream
- barryvdh html to pdf converter

## License
The Laravel framework is open-sourced software licensed under the MIT license.
