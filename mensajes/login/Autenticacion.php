<?php

class Autenticacion{

    const userKey = "usuario";
    const userCookie = "usuario";

    public static function estaAutenticado(){
        return (isset($_SESSION[self::userKey]));
    }
    
    public static function obtenerNombreUsuario(){
        if (self::estaAutenticado()){
            return $_SESSION[self::userKey];
        }
        return '';
    }
    
    public static function autenticar($usuario, $contrasena){
        if (servicioAutenticacion::validarUsuarioContrasena($usuario, $contrasena)){
            $_SESSION[self::userKey] = $usuario;

            setcookie(self::userCookie, $usuario);

            return true;
        }
        return false;
    }

    public static function obtenerCookieUsuario(){
        if (isset($_COOKIE[self::userCookie])){
            return $_COOKIE[self::userCookie];
        }
        return '';
    }
}
?>