<?php

namespace Estoque\Controller;

require_once '../autoloader.php';

/**
 * Description of EstoqueData
 *
 * @author Marcelo
 */
class EstoqueData
{

    protected $conn;
    protected $logger;

    public function __construct($conn = \PDO::class, $logger = Monolog\Logger::class)
    {
        $this->conn = $conn;
        $this->logger = $logger;
    }

    public function getData()
    {
        $sql = "SELECT parametro, valor FROM config ORDER BY parametro";
        $out = array();
        $i = 0;
        foreach ($this->conn->query($sql) as $row)
        {
            $out[$row->parametro] = $row->valor;
        }
        return $out;
    }

}
