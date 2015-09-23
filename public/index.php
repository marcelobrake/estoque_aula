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
    // usa a DI criada par log
    $logger = $app->log;
    //grava uma entrada do tipo INFO no arquivo de log
    $logger->addInfo("O IP $_SERVER[REMOTE_ADDR] acessou a rota /");
    
    //array com os valores que vão ser enviados para o template
    $data = array("titulo" => "APP Estoque Aula v1.0", 
        "mensagem" => "Olá, você está vendo uma página renderizada pelo Twig.");
    //código de retorno http que será retornado pela rota
    $status = 200;   
    //renderização da página index.html, com as informações de $data e $status
    $app->render("index.html", $data, $status);
});

$app->get("/teste/:nome", function ($nome) use($app) {
    $data = array('titulo' => 'Qualquer um', "nome" => $nome);
    $app->render("teste.html", $data, 200);
    
});

$app->post("/teste", function() use($app){
    echo "Outro Teste";
});

$app->run();
