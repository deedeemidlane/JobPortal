## Installation
1. Download Herd: https://herd.laravel.com/windows
2. Go to Code button --> Download ZIP --> Unzip the downloaded archive

<img width="939" alt="Screenshot 2024-11-22 at 10 25 48" src="https://github.com/user-attachments/assets/4a0528c5-6068-41d8-b261-35ca4d2d6235">

3. Open the code folder with VS Code
4. Open your terminal and run `composer install` (Press Ctrl + J to open terminal in VS Code)

<img width="1728" alt="Screenshot 2024-11-22 at 10 32 26" src="https://github.com/user-attachments/assets/1394153c-bc57-453b-9ca6-bbd1f895aa29">

5. Create `.env` file, copy `.env.example` to `.env` and update the configurations (mainly the database configuration)

<img width="398" alt="Screenshot 2024-11-22 at 10 30 48" src="https://github.com/user-attachments/assets/e975388c-8b16-487d-b27e-d559a554cb3e">

6. Go back to the terminal and run `php artisan key:generate`
7. Run `php artisan migrate --seed` to create the database tables and seed the roles and users tables
8. Run `php artisan serve`
9. Download nodejs: https://nodejs.org/en/download/prebuilt-installer
10. Open another terminal and run `npm install`, then run `npm run dev`

<img width="1728" alt="Screenshot 2024-11-22 at 10 35 21" src="https://github.com/user-attachments/assets/ce9ca9b1-7074-40b9-a0b6-ac69383dfe99">

11. Go to http://127.0.0.1:8000/

### Admin account:
- Email: admin@gmail.com
- Password: 123456
