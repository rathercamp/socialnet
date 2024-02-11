<?php
class Mensaje{
    public string $nombre;
    public string $tipoUsuario;
    public string $texto;
    public DateTime $fecha;

    function __construct(string $nombre, string $tipoUsuario, string $texto, DateTime $fecha){
        $this->nombre = $nombre;
        $this->tipoUsuario = $tipoUsuario;
        $this->texto = $texto;
        $this->fecha = $fecha;
    }

    public static function fromBody(){
        $fecha = new DateTime();
        if (isset($_POST["nombre"]) && isset($_POST["tipoUsuario"]) && isset($_POST["texto"])){
            return new Mensaje($_POST["nombre"], $_POST["tipoUsuario"], $_POST["texto"], $fecha);
        }
        else{
            return new Mensaje("", "normal", "", $fecha);
        }  
    }
} 
?>