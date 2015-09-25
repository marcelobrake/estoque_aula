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

$app->get("/teste", function() use($app) {
    try {
        $conn = $app->conn;
        var_dump($conn);
    } catch (PDOException $e) {
        var_dump($e);
    }
    echo "Outro Teste 2";
});

$app->run();
