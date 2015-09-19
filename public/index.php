<?php

require_once '../vendor/autoload.php';

$app = new Slim\Slim(array('templates.path' => "../view"));


$app->view(new \Slim\Views\Twig());
$app->view->parserOptions = array(
    'charset' => 'utf8',
    'cache' => realpath('../view/cache'),
    'auto_reload' => true,
    'strict_variables' => false,
    'autoescape' => true
);
$app->view->parserExtensions = array(new \Slim\Views\TwigExtension());

/*
 * DI - Dependency Injector
 * Adiciona uma dependencia dentro da aplicação que pode ser usada
 * chamando apenas o dependência
 */
$app->container->singleton("log", function (){
    $logger = new Monolog\Logger("estoque_aula");
    $logger->pushHandler(new Monolog\Handler\StreamHandler("../logs/acessos.log"));
    return $logger;
});

$app->get("/", function () use($app) {
    echo "Pagina inicial";
    //teste
    // usa a DI criada par log
    $logger = $app->log;
    //grava uma entrada do tipo INFO no arquivo de log
    $logger->addInfo("O IP $_SERVER[REMOTE_ADDR] acessou a rota /");
    
});



$app->run();
