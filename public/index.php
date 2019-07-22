<?php

require '../vendor/autoload.php';

use Slim\App;

// Instantiate the app
$settings = require __DIR__ . '/../src/app/config/settings.php';
$app = new App($settings);

// Set up dependencies
$dependencies = require __DIR__ . '/../src/app/config/dependencies.php';
$dependencies($app);

// Register middleware
$middleware = require __DIR__ . '/../src/app/config/middleware.php';
$middleware($app);

// Register routes
$routes = require __DIR__ . '/../src/app/config/routes.php';
$routes($app);

$app->run();
