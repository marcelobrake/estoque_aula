<?php

namespace Estoque\Controller;

require_once '../autoloader.php';

/**
 * Description of Fornecedor
 *
 * @author Marcelo Divaldo Brake <contato at marcelobrake dot com dot br>
 */
class Fornecedor
{

    protected $conn;
    protected $logger;

    public function __construct($conn = \PDO::class, $logger = Monolog\Logger::class)
    {
        $this->conn = $conn;
        $this->logger = $logger;
    }

        /**
     * Busca no banco de dados todos os valores referentes ao fornecedor com o #ID informado
     * @param int $id #ID do fornecedor
     * @return \Estoque\Model\Fornecedor
     */
    public function loadById($id)
    {
        $sql = "SELECT id, razaoSocial, nomeFantasia, cnpj, ie, ativo FROM fornecedor WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id, \PDO::PARAM_INT);
        $stmt->execute();
        $obj = $stmt->fetchObject();
        $fornecedor = new \Estoque\Model\Fornecedor($this->conn, $this->logger);
        $fornecedor->id = intval($obj->id);
        $fornecedor->razaoSocial = strtoupper($obj->razaoSocial);
        $fornecedor->nomeFantasia = strtoupper($obj->nomeFantasia);
        $fornecedor->cnpj = intval($obj->cnpj);
        $fornecedor->ie = intval($obj->ie);
        $fornecedor->ativo = ord($obj->ativo);
        return $fornecedor;
    }

        public function loadByCnpj($cnpj)
    {
        $sql = "SELECT id, razaoSocial, nomeFantasia, cnpj, ie, ativo FROM fornecedor WHERE cnpj = :cnpj";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":cnpj", $cnpj, \PDO::PARAM_INT);
        $stmt->execute();
        $obj = $stmt->fetchObject();
        $fornecedor = new \Estoque\Model\Fornecedor($this->conn, $this->logger);
        $fornecedor->id = intval($obj->id);
        $fornecedor->razaoSocial = strtoupper($obj->razaoSocial);
        $fornecedor->nomeFantasia = strtoupper($obj->nomeFantasia);
        $fornecedor->cnpj = intval($obj->cnpj);
        $fornecedor->ie = intval($obj->ie);
        $fornecedor->ativo = ord($obj->ativo);
        return $fornecedor;
    }

    /**
     * Insere um novo fornecedor no banco de dados
     * @return int #ID do elemento inserido no banco
     * @throws \Exception
     */
    public function create($objFornecedor)
    {

        $sql = "INSERT INTO fornecedor (razaoSocial, nomeFantasia, cnpj, ie, ativo) VALUES(:razaoSocial, :nomeFantasia, :cnpj, :ie, :ativo)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":razaoSocial", $objFornecedor->razaoSocial, \PDO::PARAM_STR);
        $stmt->bindParam(":nomeFantasia", $objFornecedor->nomeFantasia, \PDO::PARAM_STR);
        $stmt->bindParam(":cnpj", $objFornecedor->cnpj,  \PDO::PARAM_INT);
        $stmt->bindParam(":ie", $objFornecedor->ie, \PDO::PARAM_INT);
        $stmt->bindParam(":ativo", $objFornecedor->ativo, \PDO::PARAM_INT);
        if ($stmt->execute())
        {
            return intval($this->conn->lastInsertId());
        }
        else
        {
            $this->logger->addError("Falha ao salvar um item. ");
            throw new \Exception("Falha ao cadastrar!");
        }
    }

    public function salvar($objFornecedor)
    {

        $sql = "UPDATE fornecedor SET razaoSocial = :razaoSocial, nomeFantasia = :nomeFantasia, cnpj = :cnpj, ie = :ie, ativo = :ativo WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":razaoSocial", $objFornecedor->nome, \PDO::PARAM_STR);
        $stmt->bindParam(":nomeFantasia", $objFornecedor->email, \PDO::PARAM_STR);
        $stmt->bindParam(":cnpj", $objFornecedor->cnpj,  \PDO::PARAM_LOB);
        $stmt->bindParam(":ie", $objFornecedor->ie, \PDO::PARAM_LOB);
        $stmt->bindParam(":ativo", $objFornecedor->ativo, \PDO::PARAM_INT);
        if ($stmt->execute())
        {
            return $this;
        }
        else
        {
            $this->logger->addError("Falha ao atualizar o item. #ID: $objFornecedor->id");
            throw new \Exception("Falha ao atualizar o item. #ID: $objFornecedor->id");
        }
    }

    public function listarTodos()
    {
        $sql = "SELECT id, razaoSocial, nomeFantasia, cnpj, ie, ativo FROM fornecedor WHERE ativo = 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $lista = array();
        $fornecedor = array();
        while ($obj = $stmt->fetchObject()) {
            $fornecedor['id'] = intval($obj->id);
            $fornecedor['razaoSocial'] = mb_strtoupper($obj->razaoSocial);
            $fornecedor['nomeFantasia'] = mb_strtoupper($obj->nomeFantasia);
            $fornecedor['cnpj'] = $obj->cnpj;
            $fornecedor['ie'] = $obj->ie;
            $fornecedor['ativo'] = ord($obj->ativo);
            array_push($lista, $fornecedor);
        }
        return $lista;
    }

    
}
