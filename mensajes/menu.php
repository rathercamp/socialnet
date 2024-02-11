<?php include_once "modelo/entidades/Mensaje.php" ?>
<?php include_once "modelo/servicios/servicioMensajes.php" ?>
<?php include_once "modelo/servicios/servicioAutenticacion.php" ?>
<?php include_once "login/Autenticacion.php" ?>
<?php include_once "modelo/mysql/mysqlbd.php" ?>
<?php include_once "modelo/DAO/daoMensajesMySql.php" ?>
<?php include_once "modelo/DAO/daoMensajesSesion.php" ?>

<?php
    session_start();

    if(!Autenticacion::estaAutenticado()){
        header("Location: login/login.php");
        exit();
    }
?>
<div class="menu">
    <?php echo Autenticacion::obtenerNombreUsuario() ?>

    <a class="logout" href="login/logout.php">Cerrar sesion</a>   
</div>
<?php include "cabecera.html"; ?>

