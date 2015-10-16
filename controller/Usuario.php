<?php

namespace Estoque\Controller;

require_once '../autoloader.php';

/**
 * Description of Usuario
 *
 * @author Marcelo
 */
class Usuario
{

    protected $conn;
    protected $logger;

    public function __construct($conn = \PDO::class, $logger = Monolog\Logger::class)
    {
        $this->conn = $conn;
        $this->logger = $logger;
    }

    public function autenticar($email, $senha)
    {
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        $senha = filter_var($senha, FILTER_DEFAULT);
        $usuario = $this->loadByEmail($email);
        if (password_verify($senha, $usuario->senha) === false)
        {
            $this->logger->addInfo("Tentativa de autenticacao com falha. (email: $email, senha: $senha)");
            return false;
        }
        $currentHashAlgorithm = PASSWORD_DEFAULT;
        $currentHashOptions = array('cost' => 12);
        $passwordNeedsRehash = password_needs_rehash($usuario->senha, $currentHashAlgorithm, $currentHashOptions);
        if ($passwordNeedsRehash === true)
        {
            $usuario->senha = password_hash($senha, $currentHashAlgorithm, $currentHashOptions);
            $this->salvar($usuario);
            $this->logger->addInfo("Senha atualizada apos o login. ($email)");
        }
        return true;
    }

    /**
     * Busca no banco de dados todos os valores referentes ao usuario com o #ID informado
     * @param int $id #ID do usuario
     * @return \Estoque\Model\Usuario
     */
    public function loadById($id)
    {
        $sql = "SELECT id, nome, email, senha, administrador, ativo FROM usuario WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", $id, \PDO::PARAM_INT);
        $stmt->execute();
        $obj = $stmt->fetchObject();
        $usuario = new \Estoque\Model\Usuario($this->conn, $this->logger);
        $usuario->id = intval($obj->id);
        $usuario->nome = strtoupper($obj->nome);
        $usuario->email = strtolower($obj->email);
        $usuario->senha = $obj->senha;
        $usuario->administrador = ord($obj->administrador);
        $usuario->ativo = ord($obj->ativo);
        return $usuario;
    }

        public function loadByEmail($email)
    {
        $sql = "SELECT id, nome, email, senha, administrador, ativo FROM usuario WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":email", $email, \PDO::PARAM_STR);
        $stmt->execute();
        $obj = $stmt->fetchObject();
        $usuario = new \Estoque\Model\Usuario($this->conn, $this->logger);
        $usuario->id = intval($obj->id);
        $usuario->nome = strtoupper($obj->nome);
        $usuario->email = strtolower($obj->email);
        $usuario->senha = $obj->senha;
        $usuario->administrador = ord($obj->administrador);
        $usuario->ativo = ord($obj->ativo);
        return $usuario;
    }

    /**
     * Insere um novo usuario no banco de dados
     * @return int #ID do elemento inserido no banco
     * @throws \Exception
     */
    public function create($objUsuario)
    {

        $sql = "INSERT INTO usuario (nome, email, senha, administrador, ativo) VALUES(:nome, :email, :senha, :administrador, :ativo)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":nome", $objUsuario->nome, \PDO::PARAM_STR);
        $stmt->bindParam(":email", $objUsuario->email, \PDO::PARAM_STR);
        $stmt->bindParam(":senha", password_hash($objUsuario->senha, PASSWORD_DEFAULT, array('cost' => 12)), \PDO::PARAM_STR);
        $stmt->bindParam(":administrador", $objUsuario->administrador, \PDO::PARAM_INT);
        $stmt->bindParam(":ativo", $objUsuario->ativo, \PDO::PARAM_INT);
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

    public function salvar($usuario)
    {

        $sql = "UPDATE usuario SET nome = :nome, email = :email, senha = :senha, administrador = :administrador, ativo = :ativo WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":nome", $usuario->nome, \PDO::PARAM_STR);
        $stmt->bindParam(":email", $usuario->email, \PDO::PARAM_STR);
        $stmt->bindParam(":senha", password_hash($usuario->senha, PASSWORD_DEFAULT, array('cost' => 12)), \PDO::PARAM_STR);
        $stmt->bindParam(":administrador", $usuario->administrador, \PDO::PARAM_INT);
        $stmt->bindParam(":ativo", $usuario->ativo, \PDO::PARAM_INT);
        $stmt->bindParam(":id", $usuario->id, \PDO::PARAM_INT);
        if ($stmt->execute())
        {
            return $this;
        }
        else
        {
            $this->logger->addError("Falha ao atualizar o item. #ID: $usuario->id");
            throw new \Exception("Falha ao atualizar o item. #ID: $usuario->id");
        }
    }

    public function listarTodos()
    {
        $sql = "SELECT id, nome, email, senha, administrador, ativo FROM usuario WHERE ativo = 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $lista = array();
        $usuario = array();
        while ($obj = $stmt->fetchObject()) {
            $usuario['id'] = intval($obj->id);
            $usuario['nome'] = mb_strtoupper($obj->nome);
            $usuario['email'] = strtolower($obj->email);
            $usuario['senha'] = $obj->senha;
            $usuario['administrador'] = ord($obj->administrador);
            $usuario['ativo'] = ord($obj->ativo);
            array_push($lista, $usuario);
        }
        return $lista;
    }

}
