<?php

require_once '../vendor/autoload.php';
require_once '../autoloader.php';

$app = new Slim\Slim(array('templates.path' => "../view"));

$app->view(new \Slim\Views\Twig());
$app->view->parserOptions = array(
    'charset' => 'utf8',
    'cache' => realpath('../view/cache'),
    'auto_reload' => true,
    'strict_variables' => false,
    'autoescape' => true,
    'debug' => true,
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
$app->container->singleton("conn", "conexao");

$app->container->singleton('data', function () use ($app) {
    $data = new Estoque\Controller\EstoqueData($app->conn, $app->log);
    return $data->getData();
});

include '../controller/autenticacao.php';

$app->get("/", function () use($app) {
    $data = $app->data;
    $status = 200;
    $app->render("index.html", $data, $status);
});

include '../config/usuario.php';
include '../config/cliente.php';
include '../config/fornecedor.php';
include '../config/produto.php';
include '../config/compra.php';
include '../config/venda.php';

$app->notFound(function () use ($app) {
    $data = $app->data;
    $status = 404;
    $app->render('404.html', $data, $status);
});


$app->get('/test', function () use ($app) {
    $fornecedor = new \Estoque\Controller\Fornecedor($app->conn, $app->log);
    $objFornecedor = new Estoque\Model\Fornecedor($app->conn, $app->log);

    $objFornecedor->razaoSocial = "TESTE 3";
    $objFornecedor->nomeFantasia = "Teste  3   teste 3";
    $objFornecedor->cnpj = 7623483000121;
    $objFornecedor->ie = 7623483000121;
    $objFornecedor->ativo = 1;
    
    var_dump($objFornecedor);
    //$fornecedor->create($objFornecedor);
    
    
});



$app->run();
