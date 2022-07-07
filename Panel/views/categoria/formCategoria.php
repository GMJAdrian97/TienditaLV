<?php require_once('../../../Componentes/headerAdmin.php'); ?>
<div id="container">
    <h1> <?php echo(isset($id_categoria))? "Modificar ": "Agregar ";?>&bull; Categoria &bull;</h1>
    <div class="underline">
    </div>
    <?php 
    if(isset($id_categoria)){
      ?>
    <?php
    }
?>
    <form method="POST"
        action="ctrlCategoria.php?accion=<?php echo(isset($id_categoria))? "update&id_categoria=".$id_categoria: "add"; ?>"
        enctype="multipart/form-data">
        <div class="name">
            <label for="name"></label>
            <input type="text" value="<?php echo(isset($id_categoria)) ? $datosCategoria['nombre']:"";?>"
                placeholder="Nombre" name="nombre" id="name_input" required>
        </div>
        <div class="submit">
            <input type="submit" value="Guardar" id="form_button" />
        </div>
    </form><!-- // End form -->
</div><!-- // End #container -->