# tungstenjs_laravel_example

## Install

    composer install
    cp .env.example .env
    php artisan key:generate
    # Start server.  For simple DEV ONLY server, use the built in php server:
    php -S localhost:8000
    # Set up JS, start dev server
    cd resources/assets
    npm install
    cd ../..
    node ./node_modules/webpack-dev-server/bin/webpack-dev-server.js -d --port 9090
    # Open localhost:8000

## Relevant files

* `config/javascript.php`
* `app/Http/Controllers/Home/HomeController.php`
* `resources/views/layouts/master.blade.php`
* `resources/views/todo_app_view.mustache`