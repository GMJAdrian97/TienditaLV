<?php require_once('../../../Componentes/headerAdmin.php'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1>Lista de Categoria</h1>
        </div>
    </div>
    <center><a href="ctrlCategoria.php?accion=new" class="btn btn-primary"> Añadir nueva Categoria </a></center>   
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

                <?php foreach ($datosCategoria as $key => $categoria):?>
                <tr style=" text-align: center">
                    <th scope="row"><?php echo $categoria['id_categoria']; ?></th>
                    <td><?php echo $categoria['nombre']; ?></td>
                    <td>
                        <div>
                        <a href="ctrlCategoria.php?accion=modify&id_categoria=<?php echo $categoria['id_categoria']; ?>"><i
                                        class="bi bi-pencil"></i></a>
                        <a href="ctrlCategoria.php?accion=delete&id_categoria=<?php echo $categoria['id_categoria']; ?>"><i
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