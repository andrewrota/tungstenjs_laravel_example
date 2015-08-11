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
    node ./node_modules/webpack-dev-server/bin/webpack-dev-server.js -d --port 9090
    # Open localhost:8000