<?php

class Mysqlbd{
    private static function conectar(){
        static $conexion = null;
        $config = parse_ini_file(__DIR__ . "/../../config.ini");

        if(!$conexion){
            $conexion = new mysqli($config["host"], $config["user"], $config["pass"], $config["bd"]);
        }
        
        return $conexion;
    }

    private static function preparar($conexion, $consulta, $parametros){
        $preparacion = $conexion->prepare($consulta);
        if ($parametros){
            $tipos = "";
            foreach ($parametros as $parametro){
                $tipos .= is_integer($parametro) ? "i" : "s";
            }
            $preparacion->bind_param($tipos, ...$parametros);
        }
        return $preparacion;
    }

    public static function consultaLectura($consulta, ...$parametros){
        $conexion = self::conectar();

        $retorno = array();
        $preparacion = self::preparar($conexion, $consulta, $parametros);
        $preparacion->execute();
        $resultado = $preparacion->get_result();

        while($fila = $resultado->fetch_assoc()){
            array_push($retorno, $fila);
        }

        return $retorno;
    }

    public static function consultaEscritura($consulta, ...$parametros){
        $conexion = self::conectar();

        $preparacion = self::preparar($conexion, $consulta, $parametros);
        $preparacion->execute();
        
    }
}
?>