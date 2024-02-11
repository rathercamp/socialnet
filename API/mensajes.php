<?php include_once "modelo/entidades/Mensaje.php" ?>
<?php include_once "modelo/servicios/servicioMensajes.php" ?>
<?php include_once "modelo/servicios/servicioAutenticacion.php" ?>
<?php include_once "modelo/mysql/mysqlbd.php" ?>
<?php include_once "modelo/DAO/daoMensajesMySql.php" ?>
<?php include_once "modelo/DAO/daoMensajesSesion.php" ?>
<?php include_once "dto/mensajeDto.php" ?>
<?php include_once "comun/autorizacion.php" ?>
<?php

$badRequestCode = 400;
$notFoundCode = 404;
$methodNotAllowedCode = 405;

$metodo = $_SERVER["REQUEST_METHOD"];

switch($metodo){
    case "POST":
        $body = file_get_contents("php://input");
        if($body){
            $mensajeDto = MensajeDto::fromJson($body);

            $mensaje = $mensajeDto->toMensaje();
            ServicioMensajes::insertarMensaje($mensaje);
        }else{
            echo "La solicitud no puede estar vacia";
            http_response_code($badRequestCode);
        }
        break;
    case "GET":
        if (isset($_GET["id"]) && $_GET["id"]!= ""){
            $id = $_GET["id"];
            $mensaje = ServicioMensajes::buscarMensaje($id);
        
            if($mensaje){
                header("Content-Type: Application/json");
                echo json_encode(MensajeDto::fromMensaje($mensaje));
            }else{
                echo "Mensaje con id $id no encontrado";
                http_response_code($notFoundCode);
            }     
        
        } else {
            $mensajes = ServicioMensajes::obtenerMensajes();
        
            $listaMsgsDto = array();
            foreach ($mensajes as $mensaje){
                array_push($listaMsgsDto, MensajeDto::fromMensaje($mensaje));
            }
            echo json_encode($listaMsgsDto);
        }
        break;
    case "PUT":
        $body = file_get_contents("php://input");
        if($body){
            $mensajeDto = MensajeDto::fromJson($body);

            $mensaje = $mensajeDto->toMensaje();
            ServicioMensajes::actualizarMensaje($mensaje);
        }else{
            echo "La solicitud no puede estar vacia";
            http_response_code($badRequestCode);
        }
        break;
    case "DELETE":
        if (isset($_GET["id"]) && $_GET["id"]!= ""){
            $id = $_GET["id"];    
            servicioMensajes::eliminarMensaje($id);
        } else {
            echo "El id es obligatorio";
            http_response_code($badRequestCode);
        }
        break;
    default:
        http_response_code($methodNotAllowedCode);
        break;
}
?>