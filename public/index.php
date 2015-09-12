<?php

require_once '../vendor/autoload.php';

$app = new Slim\Slim();

$app->get("/", function () {
    echo "Pagina inicial";

    $logger = new Monolog\Logger("acesso_barra");
    $logger->pushHandler(new Monolog\Handler\StreamHandler("../logs/acessos.log"));
    $logger->addInfo("O IP $_SERVER[REMOTE_ADDR] acessou a rota /");
    
});



$app->run();
