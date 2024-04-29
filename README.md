## How to start the app

npm install
composer install

copy .env.example .env
set in .env
shopify tokens are provided in the email for test

configure the database in env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1 (your host)
DB_PORT=3306 (your port)
DB_DATABASE=laravel (database name)
DB_USERNAME=root (usename)
DB_PASSWORD=root (password)

php artisan key:generate

php artisan migrate

npm run dev
php artisan serve