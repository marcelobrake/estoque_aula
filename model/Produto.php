<?php

namespace Estoque\Model;

require_once '../autoloader.php';

/**
 * Description of Produto
 *
 *@author Marcelo Brake <contato at marcelobrake dot com dot br>
 */
class Produto
{

    private $id;
    private $fornecedor;
    private $descricao;
    private $cbarras;
    private $preco;
    private $qtde;
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
            case 'fornecedor':
                return $this->fornecedor;
                break;
            case 'descricao':
                return $this->descricao;
                break;
            case 'cbarras':
                return $this->cbarras;
                break;
            case 'preco':
                return $this->preco;
                break;
            case 'qtde':
                return $this->qtde;
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
            case 'fornecedor':
                if (is_a($value, "\Estoque\Model\Fornecedor"))
                {
                    $this->fornecedor = $value;
                }
                else
                {
                    $this->logger->addError("Tentativa de carga ao atributo $name com dados inválidos");
                    throw new \Exception("Atributo $name com dados inválidos.");
                }
                break;
            case 'descricao':
                $this->descricao = filter_var($value, FILTER_SANITIZE_STRING);
                break;
            case 'cbarras':
                $this->cbarras = filter_var($value, FILTER_SANITIZE_STRING);
                break;
            case 'preco':
                $this->preco = floatval($value);
                break;
            case 'qtde':
                $this->qtde = intval($value);
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
