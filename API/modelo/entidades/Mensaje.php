<?php
class Mensaje{
    public int $id;
    public string $nombre;
    public string $tipoUsuario;
    public string $texto;
    public DateTime $fecha;

    function __construct(int $id, string $nombre, string $texto, string $tipoUsuario , DateTime $fecha){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->texto = $texto;
        $this->tipoUsuario = $tipoUsuario;
        $this->fecha = $fecha;
    }
} 
?>