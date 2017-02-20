<?php
require 'vendor/autoload.php';

use \Slim\App;

$corsOptions = array("origin" => "*");

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];

$c = new \Slim\Container($configuration);

$app = new \Slim\App($c);

$cors = new \CorsSlim\CorsSlim($corsOptions);

$app->add($cors);

require 'routes/category.php';
require 'routes/product.php';
require 'routes/filter.php';

$app->run();