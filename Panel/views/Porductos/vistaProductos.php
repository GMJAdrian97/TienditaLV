<?php require_once('../../../Componentes/headerAdmin.php'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Lista de productos</h1>
        </div>
    </div>
    <a href="ctrlProducto.php?accion=new" class="btn btn-primary"> Añadir nuevo producto</a>
    <div class="row">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Medida</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Costo</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">QR</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Proveedor</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($datosProducto as $key => $producto):?>
                <tr>
                    <th scope="row"><?php echo $producto['id_producto']; ?></th>
                    
                    <td><?php echo $producto['nombre']; ?></td>
                    <td>
                        <div class="text-center">
                            <img src="../../image/imagProduc/<?php echo $producto['imagen']; ?>" class="img-circle"
                                width="200" alt="suple">
                        </div>
                    </td>
                    <td><?php echo $producto['medida']; ?></td>
                    <td><?php echo $producto['precio']; ?></td>
                    <td><?php echo $producto['stock']; ?></td>
                    <td><?php echo $producto['costo']; ?></td>
                    <td><?php echo $producto['descripcion']; ?></td>
                    <td>
                        <div class="text-center">
                            <img src="../../image/imagProduc/<?php echo $producto['qr']; ?>" class="img-circle"
                                width="200" alt="suple">
                        </div>
                    </td>
                    <td><?php echo $producto['marca']; ?></td>
                    <td><?php echo $producto['categoria']; ?></td>
                    <td><?php echo $producto['proveedor']; ?></td>
                    <td>
                        <div>
                            <i class="btn btn-info bi-pencil"><a
                                    href="ctrlProducto.php?accion=modify&id_producto=<?php echo $producto['id_producto']; ?>">Modificar</a></i>
                            <i class="btn btn-secondary bi bi-trash"><a
                                    href="ctrlProducto.php?accion=delete&id_producto=<?php echo $producto['id_producto']; ?>">Eliminar</a></i>
                        </div>
                    </td>
                </tr>

                <?php
                endforeach;
            ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once('../../../Componentes/footer.php'); ?>