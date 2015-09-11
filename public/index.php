<?php

require_once '../vendor/autoload.php';

$app = new Slim\Slim();

$app->get("/", function () {
    echo "Pagina inicial";
});

$app->run();