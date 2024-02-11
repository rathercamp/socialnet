<?php include_once "modelo/servicios/servicioAutenticacion.php" ?>
<?php include_once "dto/loginDto.php" ?>
<?php include_once "modelo/mysql/mysqlbd.php" ?>
<?php include_once "comun/autorizacion.php" ?>

<?php
$badRequestCode = 400;
$methodNotAllowedCode = 405;
   
$metodo = $_SERVER["REQUEST_METHOD"];
   
switch($metodo){
    case "POST":
        $body = file_get_contents("php://input");
        if($body){
            $loginDto = LoginDto::fromJson($body);
            if(!servicioAutenticacion::validarUsuarioContrasena($loginDto->usuario, $loginDto->contrasena)){
                echo "Usuario y/o contraseña incorrectos";
                http_response_code($badRequestCode);
            }
        }
        else{
            echo "La solicitud no puede estar vacia";
            http_response_code($badRequestCode);
        }
        break;
    default:
        http_response_code($methodNotAllowedCode);
        break;
}
?>