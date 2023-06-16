<?php
include_once("controller/ServicoController.php");
include_once("router.php");

try {
    router("post", "servico", function () {
        $servicoController = new ServicoController;
        $servicoController->postServico();
    });

    router("get", "servico", function () {
        $servicoController = new ServicoController;
        $servicoController->getServico();
    });

    router("put", "servico", function () {
        $servicoController = new ServicoController;
        $servicoController->putServico();
    });

    router("delete", "servico", function () {
        $servicoController = new ServicoController();
        $servicoController->deleteServico();
    });
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(array("error" => $e->getMessage()));
}
