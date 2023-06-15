<?php
include_once("DAO.php");

class ServicoService
{
    function add(Servico $servico)
    {
        try {
            $sql = "INSERT INTO servicos (nome, descricao, preco) VALUES (:nome, :descricao, :preco)";
            $dao = new DAO;
            $conn = $dao->connect();
            $stman = $conn->prepare($sql); //Iniciar o preparativo para o envio dos dados ao banco;
            $stman->bindParam(":nome", $servico->nome); //Troca dos paramentos
            $stman->bindParam(":descricao", $servico->descricao);
            $stman->bindParam(":preco", $servico->preco);
            $stman->execute(); //Gravar os dados no banco de dados
        } catch (Exception $e) {
            throw new Exception("Erro ao cadastrar!" . $e->getMessage());
        }
    }

    function getAll()
    {
        try {
            $sql = "SELECT id, nome, descricao, preco FROM servicos WHERE ativo = true";
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
            $sql = "SELECT id, nome, descricao, preco FROM servicos WHERE ativo = true AND id = :id";
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

    function update(Servico $servico)
    {
        try {
            $sql = "UPDATE servicos SET nome = :nome, descricao = :descricao, preco = :preco WHERE id = :id";
            $dao = new DAO;
            $conn = $dao->connect();
            $stman = $conn->prepare($sql);
            $stman->bindParam(":nome", $servico->nome);
            $stman->bindParam(":email", $servico->descricao);
            $stman->bindParam(":id", $servico->id);
            $stman->bindParam(":preco", $servico->preco);
            $stman->execute();
        } catch (Exception $e) {
            throw new Exception("Erro ao atualizar!" . $e->getMessage());
        }
    }

    function delete(int $id)
    {
        try {
            //$sql = "DELETE FROM aluno WHERE matricula = :matricula";
            $sql = "UPDATE servicos SET ativo = false WHERE id = :id";
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
}
