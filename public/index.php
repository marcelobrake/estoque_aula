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
$app->container->singleton("log", function () {
    $logger = new Monolog\Logger("estoque_aula");
    $logger->pushHandler(new Monolog\Handler\StreamHandler("../logs/acessos.log"));
    return $logger;
});

$app->container->singleton("conn", function() {
    $dsn = "mysql:host=localhost;dbname=estoque";
    $usr = "estoque";
    $pwd = "estoque";
    $conn = new Slim\PDO\Database($dsn, $usr, $pwd);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    return $conn;
});

$app->get("/", function () use($app) {
    //$logger = $app->log;
    $status = 200;
    $data = array('titulo' => 'Controle Estoque v1.0');
    $app->render("index.html", $data, $status);
});

$app->run();
