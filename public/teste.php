<?php

require_once '../model/Usuario.php';

$u = new Estoque\Model\Usuario($conn, $logger);
$u->load($id);