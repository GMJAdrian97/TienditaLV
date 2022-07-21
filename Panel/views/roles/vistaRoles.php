<?php require_once('../../../Componentes/headerAdmin.php'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1>Lista de Roles</h1>
        </div>
    </div>
    <center><a href="ctrlRoles.php?accion=new" class="btn btn-primary"> Añadir nuevo rol </a></center>   
    <div class="row">
        <div class="tablePrincipa" style="justify-content: center">
        <table class="table">
            <thead class="thead-dark">
                <tr style=" text-align: center">
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($datosrol as $key => $rol):?>
                <tr style=" text-align: center">
                    <th scope="row"><?php echo $rol['id_rol']; ?></th>
                    <td><?php echo $rol['nombre']; ?></td>
                    <td>
                        <div>
                        <a href="ctrlRoles.php?accion=modify&id_rol=<?php echo $rol['id_rol']; ?>"><i
                                        class="bi bi-pencil"></i></a>
                        <a href="ctrlRoles.php?accion=delete&id_rol=<?php echo $rol['id_rol']; ?>"><i
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