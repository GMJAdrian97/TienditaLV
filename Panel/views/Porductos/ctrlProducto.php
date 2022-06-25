<?php
    require_once('mdlProducto.php');

   
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_producto = isset($_GET['id_producto']) ? $_GET['id_producto'] : NULL;
        $accion = $_GET['accion'];
    }

    switch($accion){

        default:
            $datosProducto = $producto->read();
            
            require_once('vistaProductos.php');
    }
    require_once('../../../Componentes/footer.php');

?>