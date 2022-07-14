<?php
    require_once('mdlProveedor.php');
   
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_proveedor = isset($_GET['id_proveedor']) ? $_GET['id_proveedor'] : NULL;
        $accion = $_GET['accion'];
    }

    switch($accion){
        case 'new':
            require_once('formProvee.php');
            break;

        case 'add':
            $datosFormulario = $_POST;
            $consulta = $proveedor->insert($datosFormulario);
            $datosProveedor = $proveedor->read();
            require_once('vistaProvee.php');
            break;
            
        case 'update':
            $datosProveedor=$_POST;
            $datosActualizar=$proveedor->update($datosProveedor, $id_proveedor);
            $datosProveedor = $proveedor->read();
            require_once('vistaProvee.php');
            break;


        case 'modify':
            $datosProveedor = $proveedor->readOne($id_proveedor);
            if(is_array($datosProveedor)){
                require_once('formProvee.php');
            } else{
                /* $proveedor->message(0,"Ocurrio un error, el ponente no exixte"); */
                $datosProveedor = $proveedor->read();
                require_once('formProvee.php');
                }
            break;



        case 'delete':
            $proveedorElimi=$proveedor->delete($id_proveedor);
        default:
            $datosProveedor = $proveedor->read();
            require_once('vistaProvee.php');
    }
    require_once('../../../Componentes/footer.php');

?>