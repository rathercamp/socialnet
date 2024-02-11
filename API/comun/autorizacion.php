<?php
class Autorizacion{
    public static function verificarApiKey(){
        $unauthorizedCode = 401;

        $headers = getallheaders();
        if(!isset($headers["ApiKey"]) || !servicioAutenticacion::validarApiKey($headers["ApiKey"])){
            http_response_code(401);
            echo "Debes proporcionar un api key";
            exit();
        }
    }
}

Autorizacion::verificarApiKey();
?>