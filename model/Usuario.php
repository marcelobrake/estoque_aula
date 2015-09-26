<?php

namespace Estoque\Model;

/**
 * Classe Usuario, utilizada para manipular os dados do objeto Usuario()
 *
 * @author Marcelo Brake <contato at marcelobrake dot com dot br>
 * @since 1.0
 */
class Usuario
{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $administrador;
    private $ativo;
    protected $conn;
    protected $logger;
    
    public function __construct($conn, $logger)
    {
        $this->conn = $conn;
        $this->logger = $logger;
    }
    
    public function __get($name)
    {
        switch ($name){
            case 'id':
                return $this->id;
                break;
            case 'nome':
                return $this->nome;
                break;
            case 'email':
                return $this->email;
                break;
            case 'senha':
                return $this->senha;
                break;
            case 'administrador':
                return $this->administrador;
                break;
            case 'ativo':
                return $this->ativo;
                break;
            default :
                $this->logger->addError("Atributo $name tentou ser acessado.");
                throw new Exception("Atributo $name inexistente.");
        }
    }
    
    public function __set($name, $value)
    {
        switch ($name){
            case 'id' :
                $this->id = intval($value);
                break;
            case 'nome':
                $this->nome = strtoupper($value);
                break;
            case 'email':
                $this->email = strtolower($value);
                break;
            case 'senha':
                $this->senha = $value;  //@TODO: vamos alterar depois para sanitizar a entrada
                break;
            case 'administrador':
                $this->administrador = boolval($value);
                break;
            case 'ativo':
                $this->ativo = boolval($value);
                break;
            default :
                $this->logger->addError("Tentativa de acesso no atributo $name");
                throw new Exception("Atributo $name inexistente.");
        }
    }
    
    /**
     * Busca no banco de dados todos os valores referentes ao usuario com o #ID informado
     * @param int $id #ID do usuario
     * @return \Estoque\Model\Usuario
     */
    public function load($id){
        
        return $this;
    }
}
