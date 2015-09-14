<?php

namespace Estoque\Model;

/**
 * Description of Usuario
 *
 * @author Marcelo
 */
class Usuario
{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $administrador;
    private $ativo;
    
    public function __construct()
    {
        return $this;
    }
    
    public function __set($name, $value)
    {
        $this->$name = $value;
    }
    
    public function __get($name)
    {
        return $this->$name;
    }
    
}
