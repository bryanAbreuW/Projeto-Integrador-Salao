<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set('display_startup_errors', 1);
ini_set("enable_post_data_reading", 1);


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$_ENV = parse_ini_file('.env');

// Resposta padrão---------------------
function responseDefault($code = 200, $erro = null, $message = "", $data = [])
{
    http_response_code($code);
    echo json_encode(
        array(
            "error" => $erro,
            "message" => $message,
            "data" => $data,
        )
    );
}
