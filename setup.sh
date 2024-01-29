#!/bin/bash

echo "Starting setup"
cp .env.example .env

echo "Building app"
docker-compose build

echo "Docker compose up"
docker-compose up -d

echo "Composer install"
docker exec code composer install

echo "NPM install"
docker exec code npm install
docker exec code npm audit fix

"Migrate and seed database"
./vendor/bin/sail up -d
./vendor/bin/sail artisan migrate:fresh --seed

docker exec code npm run dev &
