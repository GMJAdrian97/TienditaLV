<?php require_once('../../../Componentes/headerAdmin.php'); ?>
<div id="container">
    <h1> <?php echo(isset($id_producto))? "Modificar ": "Agregar ";?>&bull; Producto &bull;</h1>
    <div class="underline">
    </div>
    <?php 
    if(isset($id_producto)){
      ?>
    <div class="text-center">
        <img src="../../../Images/<?php echo $datosProducto['imagen']; ?>" class="img-circle" width="500"
            style="border-radius:300px" alt="img_producto">
    </div>
    <?php
    }
?>
    <form method="POST"
        action="ctrlProducto.php?accion=<?php echo(isset($id_producto))? "update&id_producto=".$id_producto: "add"; ?>"
        enctype="multipart/form-data">
        <div class="name">
            <label for="name"></label>
            <input type="text" value="<?php echo(isset($id_producto)) ? $datosProducto['nombre']:"";?>"
                placeholder="Nombre" name="nombre" id="name_input" required>
        </div>
        <div class="email">
            <label for="medida"></label>
            <input type="text" value="<?php echo(isset($id_producto)) ? $datosProducto['medida']:"";?>"
                placeholder="Medida" name="medida" id="email_input" required>
        </div>
        <div class="name">
            <label for="precio"></label>
            <input type="numeric" value="<?php echo(isset($id_producto)) ? $datosProducto['precio']:"";?>"
                placeholder="Precio" name="precio" id="name_input" required>
        </div>
        <div class="email">
            <label for="stock"></label>
            <input type="number" value="<?php echo(isset($id_producto)) ? $datosProducto['stock']:"";?>"
                placeholder="Stock" name="stock" id="email_input" required>
        </div>
        <div class="name">
            <label for="costo"></label>
            <input type="numeric" value="<?php echo(isset($id_producto)) ? $datosProducto['costo']:"";?>"
                placeholder="Costo" name="costo" id="name_input" required>
        </div>
        <div class="marca">
            <label for="marca"></label>
            <select class="custom-select" id="validatedInputGroupSelect" name="id_marca" required>
                <option selected>Marca</option>
                <?php foreach ($datosMarca as $key => $value): 
                                    $selected = "";
                                    if($value['nombre'] == $datosProducto['marca']):
                                      $selected = "selected";
                                    endif;
                                  ?>
                <option value="<?php echo $value['id_marca'];?>" <?php echo $selected; ?>> <?php echo $value['nombre']?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="categoria">
            <label for="categoria"></label>
            <select class="custom-select" id="validatedInputGroupSelect" name="id_categoria" required>
                <option selected>Categoria</option>
                <?php foreach ($datosCategoria as $key => $value): 
                                    $selected = "";
                                      if($value['nombre'] == $datosProducto['categoria']):
                                        $selected = "selected";
                                      endif;
                                  ?>
                <option value="<?php echo $value['id_categoria'];?>" <?php echo $selected; ?>>
                    <?php echo $value['nombre']?> </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="proveedor">
            <label for="validatedInputGroupSelect"></label>
            <select class="custom-select" id="validatedInputGroupSelect" name="id_proveedor" required>
                <option selected>Proveedor</option>
                <?php foreach ($datosProve as $key => $value): 
                                    $selected = "";
                                      if($value['nombre'] == $datosProducto['proveedor']):
                                        $selected = "selected";
                                      endif;
                                  ?>
                <option value="<?php echo $value['id_proveedor'];?>" <?php echo $selected; ?>>
                    <?php echo $value['nombre']?> </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile" name="imagen">
            <label class="custom-file-label" for="customFile">Selecciona una foto</label>
        </div>
        <div class="descripcion">
            <label for="descripcion"></label>
            <input name="descripcion" type="text"
                value="<?php echo(isset($id_producto)) ? $datosProducto['descripcion']:"";?>" placeholder="DESCRIPCION"
                id="message_input" cols="30" rows="5"></input>
        </div>
        <div class="submit">
            <input type="submit" value="Guardar" id="form_button" />
        </div>
    </form><!-- // End form -->
</div><!-- // End #container -->