<?php

namespace Estoque\Model;

require_once '../autoloader.php';
/**
 * Description of Compra
 *
 * @author Marcelo Brake <contato at marcelobrake dot com dot br>
 */
class Compra
{

    private $id;
    private $usuario;
    private $fornecedor;
    private $datahora;
    private $produtos;
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
            case 'cliente':
                return $this->cliente;
                break;
            case 'produtos':
                return $this->produtos;
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
            case 'usuario':
                if (is_a($value, "\Estoque\Model\Usuario"))
                {
                    $this->usuario = $value;
                }
                else
                {
                    $this->logger->addError("Tentativa de carga ao atributo $name com dados inválidos");
                    throw new \Exception("Atributo $name com dados inválidos.");
                }
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
            case 'datahora' :
                $this->datahora = $value;
                break;
            case 'produtos' :
                if (is_array($value))
                {
                    foreach ($value as $item)
                    {
                        if (!is_a($item, "\Estoque\Model\Produto"))
                        {
                            $this->logger->addError("Um item do atributo $name não é um objeto.");
                            throw new \Exception("Um item do atributo $name não é um objeto.");
                        }
                    }
                    $this->produtos = $value;
                }
                else
                {
                    $this->logger->addError("O atributo $name não é uma lista.");
                    throw new \Exception("O atributo $name não é uma lista.");
                }
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
