<?php

namespace Estoque\Model;

require_once '../autoloader.php';

/**
 * Description of Fornecedor
 *
 * @author Marcelo Brake <contato at marcelobrake dot com dot br>
 */
class Fornecedor
{

    private $id;
    private $razaoSocial;
    private $nomeFantasia;
    private $cnpj;
    private $ie;
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
            case 'razaoSocial':
                return $this->razaoSocial;
                break;
            case 'nomeFantasia':
                return $this->nomeFantasia;
                break;
            case 'cnpj':
                return $this->cnpj;
                break;
            case 'ie':
                return $this->ie;
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
            case 'razaoSocial':
                $this->razaoSocial = mb_strtoupper(filter_var($value, FILTER_SANITIZE_STRING));
                break;
            case 'nomeFantasia':
                $this->nomeFantasia = mb_strtoupper(filter_var($value, FILTER_SANITIZE_STRING));
                break;
            case 'cnpj':
                $this->cnpj = floatval($value);
                break;
            case 'ie':
                $this->ie = floatval($value);
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
