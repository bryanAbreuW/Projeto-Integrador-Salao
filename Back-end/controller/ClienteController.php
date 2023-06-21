<?php
include_once("services/ClienteService.php");
include_once("model/Cliente.php");
include_once("services/jwt.php");

class ClienteController
{
    function postCliente()
    {
        try {
            //file_get_contents: Pega dados do body contidos no request
            $body = file_get_contents('php://input');

            //json_deconde: converte texto(json) em objeto
            $dadosRequest = json_decode($body);

            $cliente = new Cliente();



            $cliente->mount($dadosRequest);

            //Valida o cliente no sistema
            $cliente->valid();

            $clienteService = new ClienteService();


            if ($cliente->id != null && $cliente->id != "" && $cliente->id != 0) {
                $clienteService->update($cliente);
                echo json_encode(array("message" => "Atualizado!"));
            } else {
                $clienteService->add($cliente);
                echo json_encode(array("message" => "Cadastrado!"));
            }
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(array("error" => $e->getMessage()));
        }
    }

    function getCliente()
    {
        try {
            $body = file_get_contents('php://input');
            $dadosRequest = json_decode($body);
            $clienteService = new ClienteService();
            if (isset($dadosRequest->id)) {
                $result = $clienteService->get($dadosRequest->id);
            } else {
                $result = $clienteService->getAll();
            }
            echo json_encode(array("message" => "resultado da busca de dados", "dados" => $result));
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(array("error" => $e->getMessage()));
        }
    }

    function putCliente()
    {
        try {
            echo "Update Cliente\n";
            //file_get_contents: Pega dados do body contidos no request
            $body = file_get_contents('php://input');

            //json_deconde: converte texto(json) em objeto
            $dadosRequest = json_decode($body);

            $cliente = new Cliente();
            $cliente->mount($dadosRequest);

            //Valida o cliente no sistema
            $cliente->valid();

            $clienteService = new ClienteService();
            $clienteService->update($cliente);
            echo json_encode(array("message" => "Atualizado!"));
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(array("error" => $e->getMessage()));
        }
    }

    function deleteCliente()
    {
        try {
            echo "Delete Cliente\n";
            $body = file_get_contents('php://input');
            $dadosRequest = json_decode($body);
            if (!$dadosRequest->id) {
                throw new Exception("Erros ao buscar parâmetros para remover!");
            }

            $clienteService = new ClienteService();
            $clienteService->delete($dadosRequest->id);
            echo json_encode(array("message" => "Dados removidos!"));
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(array("error" => $e->getMessage()));
        }
    }

    function loginCliente()
    {
        try {
            $body = file_get_contents('php://input');
            $dadosRequest = json_decode($body);
            if (!$dadosRequest->email || !$dadosRequest->senha) {
                throw new Exception("Erros ao buscar parâmetros!");
            }
            $clienteService = new ClienteService();
            $result = $clienteService->login($dadosRequest->email, $dadosRequest->senha);
            if (sizeof($result) == 0) throw new Exception("Erros ao buscar parâmetros!");
            $token = generateJWT($result[0]);
            //session_start();
            $_SESSION[$token] = $result[0];
            echo json_encode(array("message" => "resultado ao entrar", "dados" => $result, "token" => $token));
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(array("error" => $e->getMessage()));
        }
    }
}
