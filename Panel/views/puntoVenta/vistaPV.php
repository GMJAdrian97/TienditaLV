<?php require_once('../../../Componentes/headerAdmin.php'); 
?>
<div class="container">
    <div class="row">
        <h1 style="text-align:center">Punto de Venta</h1>
        <div class="col-5">
            <br /><br />
            <h5 style="text-align:center"> Escanea codigo QR </h5>
            <hr />
            <video id="previsualizacion" class="p-1 border" style="width: 100%;"> </video>
        </div>
        <div class="col-1"></div>
        <div class="col-6">
            <br /><br />
            <h5 style="text-align:center"> Facturacion de productos </h5>
            <hr />
            <table class="table">
                <thead class="thead-dark">
                    <tr style=" text-align: center">
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Accion</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                        if (isset($datosProducto)):?>
                    <tr style=" text-align: center">
                        <td><?php echo $datosProducto['id_producto'];; ?></td>
                        <td><?php echo $datosProducto['nombre']; ?></td>
                        <td><?php echo $datosProducto['precio']; ?></td>
                        <td><input type="number" /> </td>
                        <td>
                            <div>
                                <a><i class="bi bi-trash"></i></a>
                            </div>
                        </td>
                    </tr>

                    <?php
                endif; 
            
            ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once('../../../Componentes/footer.php'); ?>