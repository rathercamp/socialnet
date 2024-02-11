<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>SocialNet</title>
</head>
<body>
    <?php include "../cabecera.html"; ?>
    <?php include "autenticacion.php"; ?>
    <?php include_once "../modelo/servicios/servicioAutenticacion.php" ?>
    <?php include_once "../modelo/mysql/mysqlbd.php" ?>

    <?php 
        session_start();

        if(Autenticacion::estaAutenticado()){
            header("Location: ../index.php");
            exit();
        }

        if(isset($_POST["usuario"]) && isset($_POST["contrasena"])){
            if(Autenticacion::autenticar($_POST["usuario"], $_POST["contrasena"])){
                header("Location:../index.php");
                exit();
            }else{
            echo "Usuario y/o contraseña incorrectos";
        }
    }
    ?>
    <form method="POST" action="login.php" class="formlogin">
        <div class="marginbot">
            <label for="">Usuario</label>
            <input class="contenido" type="text" name="usuario" value="<?php echo Autenticacion::obtenerCookieUsuario()?>">
        </div>
        <div class="marginbot">
            <label for="">Contraseña</label>
            <input class="contenido" type="password" name="contrasena">
        </div>

        <div><button class= "align-right">Iniciar sesión</button></div>
    </form>
</body>
</html>