#!/bin/sh
php artisan key:generate
php artisan serve --host=127.0.0.1 --port=8000 &
sleep infinity