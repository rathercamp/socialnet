<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <title>SocialNet</title>
</head>
<body>
    <?php include "menu.php"; ?>

    <?php 
        if(!Autenticacion::estaAutenticado()){
            header("Location: login/login.php");
            exit();
        }
        
        $mensaje = Mensaje::fromBody();

        $mensajes = ServicioMensajes::obtenerMensajes();
    ?>

    <form method="POST" action="publicar.php">
        <div class="marginbot">
            <label for="">Nombre del usuario</label>
            <input class="contenido" type="text" name="nombre" value="<?php echo $mensaje->nombre; ?>">
        </div>
        <div class="marginbot">
            <label for="">Usuario normal/de pago</label>
            <select class="contenido" name="tipoUsuario" id="tipoUsuario">
            <option value="pago" <?php if($mensaje->tipoUsuario == "pago") echo "selected"; ?>>Pago</option>
            <option value="normal" <?php if($mensaje->tipoUsuario == "normal") echo "selected"; ?>>Normal</option>
            </select>
        </div>
        <div class="marginbot">
            <label for="">Texto del mensaje</label>
            <input class="contenido" type="text" name="texto" value="<?php echo $mensaje->texto; ?>">
        </div>

        <div><button class= "align-right">Publicar</button></div>
    </form>
    <div class="mensajes">
        <h2>Listado de mensajes</h2>
        <?php 
            if(count($mensajes) > 0){
                foreach($mensajes as $mensaje){
                    include "verMensaje.php";
                }
            }
            else{
                echo "No hay mensajes";
            }
        ?>
    </div>
</body>
</html>