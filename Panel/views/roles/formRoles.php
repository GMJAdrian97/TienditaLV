<?php require_once('../../../Componentes/headerAdmin.php'); ?>
<div id="container">
    <h1> <?php echo(isset($id_rol))? "Modificar ": "Agregar ";?>&bull; Roles &bull;</h1>
    <div class="underline">
    </div>
    <?php 
    if(isset($id_rol)){
      ?>
    <?php
    }
?>
    <form method="POST"
        action="ctrlRoles.php?accion=<?php echo(isset($id_rol))? "update&id_rol=".$id_rol: "add"; ?>"
        enctype="multipart/form-data">
        <div class="name"> 
            <label for="name"></label>
            <input type="text" value="<?php echo(isset($id_rol)) ? $datosrol['nombre']:"";?>"
                placeholder="Nombre" name="nombre" id="name_input" required>
        </div>
        <div class="submit">
            <input type="submit" value="Guardar" id="form_button" />
        </div>
    </form><!-- // End form -->
</div><!-- // End #container -->