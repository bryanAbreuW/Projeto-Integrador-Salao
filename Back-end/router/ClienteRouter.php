<?php
include_once("controller/ClienteController.php");
include_once("router.php");

try {
    router("post", "cliente", function () {
        $clienteController = new ClienteController();
        $clienteController->postCliente();
    });
    router("post", "cliente/login", function () {
        $clienteController = new ClienteController();
        $clienteController->loginCliente();
    });
    router("get", "cliente", function () {
        $clienteController = new ClienteController();
        $clienteController->getCliente();
    });
    router("put", "cliente", function () {
        roles(['auth']);
        $clienteController = new ClienteController();
        $clienteController->putCliente();
    });
    router("delete", "cliente", function () {
        roles(['auth']);
        $clienteController = new ClienteController();
        $clienteController->deleteCliente();
    });
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(array("error" => $e->getMessage()));
}
