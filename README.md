## How to start the app

npm install
composer install

copy .env.example .env
set in .env<br>
the keys for tets will be provided in the email also <br>
SHOPIFY_STORE="043481-a7.myshopify.com"
ACCESS_TOKEN="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"

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