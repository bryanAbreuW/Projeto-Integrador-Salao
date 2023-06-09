<?php

include_once("services/jwt.php");

function router($method, $endpoint, $callback)
{
    $server = $_SERVER;
    //var_dump($server);

    //Valida verbo do request (POST, GET, PUT, DELETE...)
    $method_request = strtolower($server["REQUEST_METHOD"]);
    $validMethod = $method_request == strtolower($method);

    $list_uri_request = explode("/", strtolower(htmlspecialchars($server["REQUEST_URI"])));
    //$list_endpoints = explode("/", strtolower(htmlspecialchars($endpoint)));
    $validURI = str_ends_with($server["REQUEST_URI"], $endpoint);


    //Ternário: seria um "IF" sem a palavra "IF".Sintaxe: <condicional> ? <true> : <false>
    return ($validMethod && $validURI) ? $callback() : false;
}

function isAuth()
{
    if (isset($_SERVER["HTTP_AUTHORIZATION"])) {
        $token = $_SERVER["HTTP_AUTHORIZATION"];
        if (validJWT($token)) {
            $token =  str_replace(["Bearer", " "], "", $token);
            $user = $_SESSION[$token];
            if (isset($user)) {
                return $user;
            }
        }
    }
    http_response_code(401);
    throw new Exception("Não autorizado");
}

function roles($listRoles)
{
    if (isset($_SERVER["HTTP_AUTHORIZATION"])) {
        $token = $_SERVER["HTTP_AUTHORIZATION"];
        if (validJWT($token)) {
            $token =  str_replace(["Bearer", " "], "", $token);
            $user = $_SESSION[$token];
            if (isset($user)) {
                for ($i = 0; $i < count($listRoles); $i++) {
                    if ($listRoles[$i] == $user->roles || $listRoles[$i] == "auth") {
                        return $user;
                    }
                }
            }
        }
    }
    http_response_code(401);
    throw new Exception("Não autorizado");
}
