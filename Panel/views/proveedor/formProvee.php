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
            <input type="text" value="<?php echo(isset($id_proveedor)) ? $datosProducto['nombre']:"";?>"
                placeholder="Nombre" name="nombre" id="name_input" required>
        </div>
        <div class="email">
            <label for="stock"></label>
            <input type="numeric" value="<?php echo(isset($id_proveedor)) ? $datosProducto['telefono']:"";?>"
                placeholder="Stock" name="stock" id="email_input" required>
        </div>
        <div class="name">
            <label for="costo"></label>
            <input type="text" value="<?php echo(isset($id_proveedor)) ? $datosProducto['direccion']:"";?>"
                placeholder="Costo" name="costo" id="name_input" required>
        </div>
        <div class="submit">
            <input type="submit" value="Guardar" id="form_button" />
        </div>
    </form><!-- // End form -->
</div><!-- // End #container -->