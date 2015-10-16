<?php

function conexao()
{
    $dsn = "mysql:host=localhost;dbname=estoque";
    $usr = "estoque";
    $pwd = "estoque";
    $conn = new Slim\PDO\Database($dsn, $usr, $pwd);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    return $conn;
}

