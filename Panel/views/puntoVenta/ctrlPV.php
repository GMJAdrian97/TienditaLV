<?php
    require_once('mdlPV.php');
    $datosProducto =null ;
    $nombreProdu = NULL;
    $id_compra = NULL;
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_compra = isset($_GET['id_compra']) ? $_GET['id_compra'] : NULL;
        $accion = $_GET['accion'];
    }

    require_once('../../../Componentes/headerAdmin.php');

    switch($accion){
        

        case 'escaneo':
            if (isset($_GET["nombre"])) {
                // asignar w1 y w2 a dos variables
                $nombreProdu = $_GET["nombre"];
                $datosProducto = $ventas->readQR($nombreProdu);
                if(is_array($datosProducto)){
                    require_once('vistaPV.php');
                }
                 
            }
           
        break;

            default:
            //$miscompras = $mcompras->readQR($correoUS);
            require_once('vistaPV.php');
        break;
      
    }


    require_once('../../../Componentes/footer.php');


?>