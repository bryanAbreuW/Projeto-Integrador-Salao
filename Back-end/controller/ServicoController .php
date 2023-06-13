<?php
include_once("services/ServicoService.php");
include_once("model/Servico.php");

class ServicoController
{
    function postServico()
    {
        try {
            //file_get_contents: Pega dados do body contidos no request
            $body = file_get_contents('php://input');

            //json_deconde: converte texto(json) em objeto
            $dadosRequest = json_decode($body);

            $servico = new Servico();
            $servico->mount($dadosRequest);

            //Valida o aluno no sistema
            $servico->valid();

            $servicoService = new ServicoService();
            if ($servico->id != null && $servico->id != "" && $servico->id != 0) {
                $servicoService->update($servico);
                echo json_encode(array("message" => "Atualizado!"));
            } else {
                $servicoService->add($servico);
                echo json_encode(array("message" => "Cadastrado!"));
            }
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(array("error" => $e->getMessage()));
        }
    }

    function getServico()
    {
        try {
            $body = file_get_contents('php://input');
            $dadosRequest = json_decode($body);
            $servicoService = new ServicoService();
            if (isset($dadosRequest->id)) {
                $result = $servicoService->get($dadosRequest->id);
            } else {
                $result = $servicoService->getAll();
            }
            echo json_encode(array("message" => "resultado da busca de dados", "dados" => $result));
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(array("error" => $e->getMessage()));
        }
    }

    function putServico()
    {
        try {
            //file_get_contents: Pega dados do body contidos no request
            $body = file_get_contents('php://input');

            //json_deconde: converte texto(json) em objeto
            $dadosRequest = json_decode($body);

            $servico = new Servico();
            $servico->mount($dadosRequest);

            //Valida o aluno no sistema
            $servico->valid();

            $servicoService = new ServicoService();
            $servicoService->update($servico);
            echo json_encode(array("message" => "Atualizado!"));
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(array("error" => $e->getMessage()));
        }
    }

    function deleteServico()
    {
        try {
            $body = file_get_contents('php://input');
            $dadosRequest = json_decode($body);
            if (!$dadosRequest->id) {
                throw new Exception("Erros ao buscar parâmetros para remover!");
            }

            $servicoService = new ServicoService();
            $servicoService->delete($dadosRequest->id);
            echo json_encode(array("message" => "Dados removidos!"));
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(array("error" => $e->getMessage()));
        }
    }
}
