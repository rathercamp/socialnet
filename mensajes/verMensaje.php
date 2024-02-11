<?php if(isset($mensaje)): ?>
    <div class="border marginbot">
        <div class="marginbot">
            <span class="contenido"><?php echo $mensaje->nombre; ?></span>

            <?php if($mensaje->tipoUsuario == "pago"): ?>
                <img class="pago" src="img/star-icon.png">
            <?php endif; ?>
            <span class="align-right"><?php echo $mensaje->fecha->format("d/M/y H:i:s"); ?></span>
        </div>
        <div>
            <?php echo $mensaje->texto; ?>
        </div>
    </div>

<?php endif; ?>