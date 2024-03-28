Установить зависимости
composer install

Скопируйте .env файл
cp .env.example .env

Сгенерировать ключ приложения
php artisan key:generate

Запустите миграции и cидеры
php artisan migrate --seed


Запустите сервер
php artisan serve