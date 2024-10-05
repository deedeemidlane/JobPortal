## Installation
1. Download Herd: https://herd.laravel.com/windows
2. Go to Code button --> Download ZIP --> Unzip the downloaded archive
3. Open the code folder with VS Code
4. Open your terminal and run `composer install`
5. Copy `.env.example` to `.env` and update the configurations (mainly the database configuration)
6. In your terminal run `php artisan key:generate`
7. Run `php artisan migrate --seed` to create the database tables and seed the roles and users tables
8. Run `php artisan serve` and go to http://127.0.0.1:8000/
