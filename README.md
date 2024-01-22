# Description
This project uses Laravel as backend due to the requirement of the time the system was copulated with the Frontend
using Vue3 and Vite as the bundler, but both projects are independent and can be used separately.

The database in Sqlite is included for testing purposes, but it can be changed to any other database engine if needed.

TODO list
- [ ] Add unit tests
- [ ] Add integration tests
- [ ] Add pipeline to run tests
- [ ] Add pipeline to deploy to production

# Installation

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
```

Init Laravel Sail

```bash
./vendor/bin/sail up -d
```

Copy .env.example to .env

```bash
cp .env.example .env
```

Generate key

```bash
./vendor/bin/sail artisan key:generate
```

Run migration

```bash
./vendor/bin/sail artisan migrate
```

Init npm vite

```bash
./vendor/bin/sail npm install && ./vendor/bin/sail npm run dev
```

# Usage

Open http://localhost/pets/create
