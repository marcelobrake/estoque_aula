<?php

function conexao()
{
      $tipo = "mysql";
      $host = "localhost";
      $dbname = "estoque";
      $usr = "estoque";
      $pwd = "estoque";
      $dsn = "$tipo:host=$host;dbname=$dbname";
      $conn = new Slim\PDO\Database($dsn, $usr, $pwd);
      $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
      return $conn;
}