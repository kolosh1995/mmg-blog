MMG-BLOG Install

1. git clone
2. composer install
3. copy .env.example file to .env
4. docker-compose up -d
5. chmod 777 -R storage/
6. sudo chmod 777 -R bootstrap/cache/
7. docker-compose exec php php artisan migrate
8. docker-compose exec php php artisan db:seed
9. docker-compose run --rm node npm run watch




