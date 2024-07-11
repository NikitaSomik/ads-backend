# Todo list API

## Installation

1. Clone the project `git@github.com:NikitaSomik/ads-backend.git`
2. ####Run through docker-compose in root directory project ads-backend
3. Copy .env.example to .env

   `cp .env.example .env`

4. Download composer docker image to install dependencies.

   `docker run --rm --interactive --tty -v $(pwd):/app composer install`

5. Configure a shell alias that allows you to execute Sail's commands more easily

   `alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'`

6. Build and run project with **sail in daemon mode**

   `sail up -d --build`

7. Generate app key

   `sail exec -it laravel.test php artisan key:generate`

8. Create symlinks for storage

   `sail exec -it laravel.test php artisan storage:link`

9. Run migrations and seeds

   `sail exec -it laravel.test php artisan migrate --seed`
