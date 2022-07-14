<?php require_once('../../../Componentes/headerAdmin.php'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1>Lista de Marca</h1>
        </div>
    </div>
    <center><a href="ctrlmarca.php?accion=new" class="btn btn-primary"> Añadir nueva marca </a></center>   
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

                <?php foreach ($datosmarca as $key => $marca):?>
                <tr style=" text-align: center">
                    <th scope="row"><?php echo $marca['id_marca']; ?></th>
                    <td><?php echo $marca['nombre']; ?></td>
                    <td>
                        <div>
                        <a href="ctrlmarca.php?accion=modify&id_marca=<?php echo $marca['id_marca']; ?>"><i
                                        class="bi bi-pencil"></i></a>
                        <a href="ctrlmarca.php?accion=delete&id_marca=<?php echo $marca['id_marca']; ?>"><i
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