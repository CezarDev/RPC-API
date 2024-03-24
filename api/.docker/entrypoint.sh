#!/bin/sh

echo "Iniciando o container..."
chmod +x ./.docker/entrypoint.sh
composer install
chmod -R 777 bootstrap
chmod -R 777 public/
chmod -R 777 storage
chmod -R 777 vendor
composer dumpautoload -o
php artisan optimize:clear
php artisan migrate
php artisan db:seed

echo "Concluído! O container está pronto para uso."
