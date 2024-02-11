<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <title>SocialNet</title>
</head>
<body>
    <?php include_once "menu.php" ?>

    <?php 

        $mensaje = Mensaje::fromBody();

    ?>

    <form method="POST" action="publicar.php">
        <?php if (isset($_POST["Aceptar"])): ?>
            <h2>¡Tu mensaje se ha publicado con éxito!</h2>
            <?php include "verMensaje.php" ?>

            <?php 
                ServicioMensajes::insertarMensaje($mensaje);
            ?>
            <a href="index.php">Volver al menú</a>
        <?php else: ?>
            <h2>Vas a publicar el siguiente mensaje:</h2>
            <?php include_once "verMensaje.php" ?>

            <div>
                <button name="Aceptar">Aceptar</button>
                <button name="Cancelar" formaction="index.php">Cancelar</button>
            </div>

        <?php endif; ?>

        <div><input type="hidden" name="nombre" value="<?php echo $mensaje->nombre; ?>"></div>
        <div><input type="hidden" name="tipoUsuario" value="<?php echo $mensaje->tipoUsuario; ?>"></div>
        <div><input type="hidden" name="texto" value="<?php echo $mensaje->texto; ?>"></div>


    </form>
</body>
</html>