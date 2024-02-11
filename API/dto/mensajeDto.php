<?php
class MensajeDto{
    public string $id;
    public string $nombre;
    public string $tipoUsuario;
    public string $texto;
    public string $fecha;

    function __construct($id, string $nombre, string $texto, string $tipoUsuario, string $fecha){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->texto = $texto;
        $this->tipoUsuario = $tipoUsuario;
        $this->fecha = $fecha;
    }

    public function toMensaje(){
        $fecha = $this->fecha ? new DateTime($this->fecha) : new DateTime();
        return new Mensaje((int)$this->id, $this->nombre, $this->texto, $this->tipoUsuario, $fecha);
    }

    public static function fromMensaje ($mensaje){
        return new MensajeDto($mensaje->id, $mensaje->nombre, $mensaje->texto, $mensaje->tipoUsuario, $mensaje->fecha->format("c"));
    }

    public static function fromJson ($json){
        $objeto = json_decode($json);

        $id = isset($objeto->id) ? $objeto->id : "0";
        $nombre = isset($objeto->nombre) ? $objeto->nombre : "";
        $texto = isset($objeto->texto) ? $objeto->texto : "";
        $tipoUsuario = isset($objeto->tipoUsuario) ? $objeto->tipoUsuario : "";
        $fecha = isset($objeto->fecha) ? $objeto->fecha : "";

        return new MensajeDto($id, $nombre, $texto, $tipoUsuario, $fecha);
    }
} 
?>