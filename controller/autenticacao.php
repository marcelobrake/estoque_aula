<?php

//Adiciona um cookie de sessão
$app->add(new \Slim\Middleware\SessionCookie(array('secret' => 'senhasupersecreta')));

//cria uma funcao de autenticação
$authenticate = function ($app) {
    return function () use ($app) {
        if (!isset($_SESSION['user']))
        {
            $_SESSION['urlRedirect'] = $app->request()->getPathInfo();
            $app->flash('error', 'Autenticacao Obrigatoria');
            $app->redirect('/entrar');
        }
    };
};

//função a ser executada antes de qualquer rota
$app->hook('slim.before.dispatch', function() use ($app) {
    $user = null;
    if (isset($_SESSION['user']))
    {
        $user = $_SESSION['user'];
    }
    $app->view()->setData('user', $user);
});

//faz o logout
$app->get("/sair", function () use ($app) {
    unset($_SESSION['user']);
    $app->view()->setData('user', null);
    $data = $app->data;
    $app->render('index.html', $data);
});

// abre o formulário de login
$app->get("/entrar", function () use ($app) {
    $flash = $app->view()->getData('flash');
    $error = '';
    if (isset($flash['error']))
    {
        $error = $flash['error'];
    }
    $urlRedirect = '/';
    if ($app->request()->get('r') && $app->request()->get('r') != '/sair' && $app->request()->get('r') != '/entrar')
    {
        $_SESSION['urlRedirect'] = $app->request()->get('r');
    }
    if (isset($_SESSION['urlRedirect']))
    {
        $urlRedirect = $_SESSION['urlRedirect'];
    }
    $email_value = $email_error = $password_error = '';
    if (isset($flash['email']))
    {
        $email_value = $flash['email'];
    }
    if (isset($flash['errors']['email']))
    {
        $email_error = $flash['errors']['email'];
    }
    if (isset($flash['errors']['password']))
    {
        $password_error = $flash['errors']['password'];
    }
    $app->render('login.html', array('error' => $error, 'email_value' => $email_value, 'email_error' => $email_error, 'password_error' => $password_error, 'urlRedirect' => $urlRedirect));
});

//ação do formulario de login
$app->post("/entrar", function () use ($app) {
    $email = $app->request()->post('email');
    $senha = $app->request()->post('password');
    $errors = array();

    $usuario = new \Estoque\Controller\Usuario($app->conn, $app->log);
    if (!$usuario->autenticar($email, $senha))
    {
        $app->flash('email', $email);
        $errors['email'] = "Dados incorretos.";
    } 

    if (count($errors) > 0)
    {
        $app->flash('errors', $errors);
        $app->redirect('/entrar');
    }
    $_SESSION['user'] = $email;
    if (isset($_SESSION['urlRedirect']))
    {
        $tmp = $_SESSION['urlRedirect'];
        unset($_SESSION['urlRedirect']);
        $app->redirect($tmp);
    }
    $app->redirect('/');
});
