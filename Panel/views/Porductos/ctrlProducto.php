<?php
    require_once('mdlProducto.php');
    require_once('../marca/mdlMarca.php');
    require_once('../categoria/mdlcategoria.php');
    require_once('../proveedor/mdlProveedor.php');
   
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_producto = isset($_GET['id_producto']) ? $_GET['id_producto'] : NULL;
        $accion = $_GET['accion'];
    }

    switch($accion){
        case 'new':
            $datosMarca = $marca->read();
            $datosCategoria = $categoria->read();
            $datosProve = $proveedor->read();
            require_once('formProduct.php');
            break;

        case 'add':
            $datosFormulario = $_POST;
            $consulta = $producto->insert($datosFormulario);
            $datosProducto = $producto->read();
            require_once('vistaProductos.php');
            break;


        default:
            $datosProducto = $producto->read();
            require_once('vistaProductos.php');
    }
    require_once('../../../Componentes/footer.php');

?>