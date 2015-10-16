<?php
namespace Estoque\Model;

require_once '../autoloader.php';

/**
 * Description of EstoqueData
 *
 * @author Marcelo
 */
class EstoqueData
{

    private $parametro;
    private $valor;
    protected $conn;
    protected $logger;

    public function __construct($conn = \PDO::class, $logger = Monolog\Logger::class)
    {
        $this->conn = $conn;
        $this->logger = $logger;
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
