<?php

use Slim\App;

return function (App $app) {

    $container = $app->getContainer();
    $app->get('/', \App\Controller\Controller::class);
};
