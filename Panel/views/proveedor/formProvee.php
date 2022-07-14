<?php require_once('../../../Componentes/headerAdmin.php'); ?>
<div id="container">
    <h1> <?php echo(isset($id_proveedor))? "Modificar ": "Agregar ";?>&bull; Proveedor &bull;</h1>
    <div class="underline">
    </div>
    <?php 
    if(isset($id_proveedor)){
      ?>
    <?php
    }
    ?>
    <form method="POST"
        action="ctrlProveedor.php?accion=<?php echo(isset($id_proveedor))? "update&id_proveedor=".$id_proveedor: "add"; ?>"
        enctype="multipart/form-data">
        <div class="name">
            <label for="name"></label>
            <input type="text" value="<?php echo(isset($id_proveedor)) ? $datosProveedor['nombre']:"";?>"
                placeholder="Nombre" name="nombre" id="name_input" required>
        </div>

        <div class="email">
            <label for="name"></label>
            <input type="text" value="<?php echo(isset($id_proveedor)) ? $datosProveedor['decripcion']:"";?>"
                placeholder="Descripcion" name="decripcion" id="name_input" required>
        </div>

        <div class="name">
            <label for="telefono"></label>
            <input type="numeric" value="<?php echo(isset($id_proveedor)) ? $datosProveedor['telefono']:"";?>"
                placeholder="Telefono" name="telefono" id="email_input" required>
        </div>
        <div class="email">
            <label for="direccion"></label>
            <input type="text" value="<?php echo(isset($id_proveedor)) ? $datosProveedor['direccion']:"";?>"
                placeholder="Direccion" name="direccion" id="name_input" required>
        </div>

        <div class="submit">
            <input type="submit" value="Guardar" id="form_button" />
        </div>
    </form><!-- // End form -->
</div><!-- // End #container -->