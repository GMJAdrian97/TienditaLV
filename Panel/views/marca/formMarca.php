<?php require_once('../../../Componentes/headerAdmin.php'); ?>
<div id="container">
    <h1> <?php echo(isset($id_marca))? "Modificar ": "Agregar ";?>&bull; Categoria &bull;</h1>
    <div class="underline">
    </div>
    <?php 
    if(isset($id_marca)){
      ?>
    <?php
    }
?>
    <form method="POST"
        action="ctrlMarca.php?accion=<?php echo(isset($id_marca))? "update&id_marca=".$id_marca: "add"; ?>"
        enctype="multipart/form-data">
        <div class="name"> 
            <label for="name"></label>
            <input type="text" value="<?php echo(isset($id_marca)) ? $datosmarca['nombre']:"";?>"
                placeholder="Nombre" name="nombre" id="name_input" required>
        </div>
        <div class="submit">
            <input type="submit" value="Guardar" id="form_button" />
        </div>
    </form><!-- // End form -->
</div><!-- // End #container -->