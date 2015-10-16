<?php

$app->post("/usuario/popular", function () use ($app) {
    $usr = new Estoque\Controller\Usuario($app->conn, $app->log);
    $objUsuario = new Estoque\Model\Usuario($app->conn, $app->log);
    $faker = Faker\Factory::create('pt_BR'); 

    $qtde = $app->request()->post('qtde');
    
    $objUsuario->nome = "marcelo divaldo brake";
    $objUsuario->email = "contato@marcelobrake.com.br";
    $objUsuario->senha = "1234567890";
    $objUsuario->administrador = 1;
    $objUsuario->ativo = 1;
    if ($id = $usr->create($objUsuario))
    {
        echo "Usuario criado com sucesso. #ID: $id, email: $objUsuario->email,senha: $objUsuario->senha<br/>";
    }
    else
    {
        echo "ERRO<br/>";
    }
    for ($i = 0; $i < $qtde; $i++)
    {
        $objUsuario->nome = $faker->firstName . " " . $faker->lastName;
        $objUsuario->email = $faker->email;
        $objUsuario->senha = $faker->password(8, 20);
        $objUsuario->administrador = 0;
        $objUsuario->ativo = 1;
        if ($id = $usr->create($objUsuario))
        {
            echo "Usuario criado com sucesso. #ID: $id, email: $objUsuario->email,senha: $objUsuario->senha<br/>";
        }
        else
        {
            echo "ERRO<br/>";
        }
    }
});

$app->get("/usuario", $authenticate($app), function () use ($app) {
    $data = $app->data;
    $data['user'] = $app->view()->getData('user');
    $lista = new Estoque\Controller\Usuario($app->conn, $app->log);
    $data['lista'] = $lista->listarTodos();
    $status = 200;
    $app->render('listarUsuarios.html', $data, $status);
});

$app->get("/usuario/:id", $authenticate($app), function ($id) use ($app) {
    $data = $app->data;
    $usr = new \Estoque\Controller\Usuario($app->conn, $app->log);
    $usuario = $usr->loadById($id);
    $data['usuario'] = $usuario->toArray();
    $status = 200;
    $app->render('formUsuario.html', $data, $status);
});

$app->post("/usuario", $authenticate($app), function () use ($app) {
    $usr = new \Estoque\Controller\Usuario($app->conn, $app->log);
    $usuario = $usr->loadById($app->request()->post('id'));
    $usuario->nome = $app->request()->post('nome');
    $usuario->email = $app->request()->post('email');
    $usuario->ativo = $app->request()->post('ativo');
    $usuario->administrador = $app->request()->post('administrador');
    $usr->salvar($usuario);
    $data = $app->data;
    $data['usuario'] = $usuario->toArray();
    $data['msg'] = "Dados atualizados com sucesso!";
    $status = 200;
    $app->render('formUsuario.html', $data, $status);
});

$app->get("/add/usuario", $authenticate($app), function () use ($app) {
    $data = $app->data;
    $status = 200;
    $data['new'] = true;
    $app->render('formUsuario.html', $data, $status);
});

$app->post("/add/usuario", $authenticate($app), function () use ($app) {
    $usr = new \Estoque\Controller\Usuario($app->conn, $app->log);
    $usuario = new \Estoque\Model\Usuario($app->conn, $app->log);
    $usuario->nome = $app->request()->post('nome');
    $usuario->email = $app->request()->post('email');
    $usuario->senha = $app->request()->post('senha');
    $usuario->ativo = $app->request()->post('ativo');
    $usuario->administrador = $app->request()->post('administrador');
    $usuario = $usr->loadById($usr->create($usuario));
    $data = $app->data;
    $data['usuario'] = $usuario->toArray();
    $data['msg'] = "Dados inseridos com sucesso.";
    $status = 200;
    $app->render('formUsuario.html', $data, $status);
});
