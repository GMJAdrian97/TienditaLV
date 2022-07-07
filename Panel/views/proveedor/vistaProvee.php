<?php require_once('../../../Componentes/headerAdmin.php'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1>Lista de proveedores</h1>
        </div>
    </div>
    <center><a href="ctrlProveedor.php?accion=new" class="btn btn-primary"> Añadir nuevo proveedor</a></center>   
    <div class="row">
        <div class="tablePrincipa" style="justify-content: center">
        <table class="table">
            <thead class="thead-dark">
                <tr style=" text-align: center">
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">descripcion</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($datosProve as $key => $proveedor):?>
                <tr style=" text-align: center">
                    <th scope="row"><?php echo $proveedor['id_proveedor']; ?></th>
                    
                    <td><?php echo $proveedor['nombre']; ?></td>
                    <td><?php echo $proveedor['decripcion']; ?></td>
                    <td><?php echo $proveedor['telefono']; ?></td>
                    <td><?php echo $proveedor['direccion']; ?></td>
                    <td>
                        <div>
                        <a href="ctrlProveedor.php?accion=modify&id_proveedor=<?php echo $proveedor['id_proveedor']; ?>"><i
                                        class="bi bi-pencil"></i></a>
                        <a href="ctrlProveedor.php?accion=delete&id_proveedor=<?php echo $proveedor['id_proveedor']; ?>"><i
                                        class="bi bi-trash"></i></a></div>
                    </td>
                </tr>

                <?php
                endforeach;
            ?>
            </tbody>
        </table></div>
    </div>
</div>
<?php require_once('../../../Componentes/footer.php'); ?>