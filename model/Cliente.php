<?php

namespace Estoque\Model;

require_once '../autoloader.php';
/**
 * Description of Cliente
 *
 * @author Marcelo Brake <contato at marcelobrake dot com dot br>
 */
class Cliente
{

    private $id;
    private $nome;
    private $senha;
    private $email;
    private $ativo;
    protected $conn;
    protected $logger;

    public function __construct($conn = \PDO::class, $logger = \Monolog\Logger::class)
    {
        $this->conn = $conn;
        $this->logger = $logger;
    }

    public function &__get($name)
    {
        switch ($name) {
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
            case 'ativo':
                return $this->ativo;
                break;
            default :
                $this->logger->addError("Tentativa de acesso ao atributo $name.");
                throw new \Exception("Atributo $name inexistente.");
        }
    }

    public function __set($name, $value)
    {
        switch ($name) {
            case 'id' :
                $this->id = intval($value);
                break;
            case 'nome':
                $this->nome = mb_strtoupper(filter_var($value, FILTER_SANITIZE_STRING));
                break;
            case 'email':
                $this->email = strtolower(filter_var($value, FILTER_SANITIZE_EMAIL));
                break;
            case 'senha':
                $this->senha = filter_var($value, FILTER_SANITIZE_STRING);
                break;
            case 'ativo':
                $this->ativo = intval($value);
                break;
            default :
                $this->logger->addError("Tentativa de carga ao atributo $name.");
                throw new \Exception("Atributo $name inexistente.");
        }
    }

    public function toArray()
    {
        return get_object_vars($this);
    }

}
