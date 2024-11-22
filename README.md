## Installation
1. Download Herd: https://herd.laravel.com/windows
2. Go to Code button --> Download ZIP --> Unzip the downloaded archive
3. Open the code folder with VS Code
4. Open your terminal and run `composer install`
5. Copy `.env.example` to `.env` and update the configurations (mainly the database configuration)
6. In your terminal run `php artisan key:generate`
7. Run `php artisan migrate --seed` to create the database tables and seed the roles and users tables
8. Download nodejs: https://nodejs.org/en/download/prebuilt-installer
9. Open terminal in VSCode and run `php artisan serve`
10. Open another terminal and run `npm install`, then ren `npm run dev`
11. Go to http://127.0.0.1:8000/

### Admin account:
- Email: admin@gmail.com
- Password: 123456
