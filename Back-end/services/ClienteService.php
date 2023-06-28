<?php
include_once("DAO.php");

class ClienteService
{
    function add(Cliente $cliente)
    {
        try {
            $sql = "INSERT INTO clientes (nome, email, telefone, senha, data_nascimento, observacao) VALUES (:nome, :email, :telefone, MD5(:senha), :data_nascimento, :observacao)";
            $dao = new DAO;
            $conn = $dao->connect();
            $stman = $conn->prepare($sql); //Iniciar o preparativo para o envio dos dados ao banco;
            $stman->bindParam(":nome", $cliente->nome); //Troca dos paramentos
            $stman->bindParam(":email", $cliente->email);
            $stman->bindParam(":telefone", $cliente->telefone);
            $stman->bindParam(":senha", $cliente->senha);
            $stman->bindParam(":data_nascimento", $cliente->data_nascimento);
            $stman->bindParam(":observacao", $cliente->observacao);
            $stman->execute(); //Gravar os dados no banco de dados
        } catch (Exception $e) {
            throw new Exception("Erro ao cadastrar!" . $e->getMessage());
        }
    }

    function getAll()
    {
        try {
            $sql = "SELECT id, nome, email, telefone FROM clientes WHERE ativo = true";
            $dao = new DAO;
            $conn = $dao->connect();
            $stman = $conn->prepare($sql);
            $stman->execute();
            $result = $stman->fetchAll();
            return $result;
        } catch (Exception $e) {
            throw new Exception("Erro ao listar os dados!" . $e->getMessage());
        }
    }

    function get(int $id)
    {
        try {
            $sql = "SELECT id, nome, email, telefone, data_nascimento, observacao FROM clientes WHERE ativo = true AND id = :id";
            $dao = new DAO;
            $conn = $dao->connect();
            $stman = $conn->prepare($sql);
            $stman->bindParam(":id", $id);
            $stman->execute();
            $result = $stman->fetchAll();
            return $result;
        } catch (Exception $e) {
            throw new Exception("Erro ao listar os dados!" . $e->getMessage());
        }
    }

    function update(Cliente $cliente)
    {
        try {
            $sql = "UPDATE clientes SET nome = :nome, email = :email WHERE id = :id";
            $dao = new DAO;
            $conn = $dao->connect();
            $stman = $conn->prepare($sql);
            $stman->bindParam(":nome", $cliente->nome);
            $stman->bindParam(":email", $cliente->email);
            $stman->bindParam(":id", $cliente->id);
            $stman->execute();
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar!" . $e->getMessage());
        }
    }

    function delete(int $id)
    {
        try {
            //$sql = "DELETE FROM cliente WHERE id = :id";
            $sql = "UPDATE clientes SET ativo = false WHERE id = :id";
            $dao = new DAO;
            $conn = $dao->connect();
            $stman = $conn->prepare($sql);
            $stman->bindParam(":id", $id);
            $stman->execute();
        } catch (PDOException $e) {
            throw new Exception("Erro ao remover os dados!" . $e->getMessage());
        } catch (Exception $e) {
            throw new Exception("Erro no servidor!" . $e->getMessage());
        }
    }


    function login(string $email, string $senha)
    {
        try {
            $sql = "SELECT id, nome, email, telefone, data_nascimento FROM clientes WHERE ativo = true AND email = :email AND senha = MD5(:senha)";
            $dao = new DAO;
            $conn = $dao->connect();
            $stman = $conn->prepare($sql);
            $stman->bindParam(":email", $email);
            $stman->bindParam(":senha", $senha);
            $stman->execute();
            $result = $stman->fetchAll();
            return $result;
        } catch (PDOException $e) {
            throw new Exception("Erro ao remover os dados!" . $e->getMessage());
        } catch (Exception $e) {
            throw new Exception("Erro no servidor!" . $e->getMessage());
        }
    }
}
