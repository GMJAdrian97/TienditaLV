<?php
    require_once('mdlRoles.php');
   
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_rol = isset($_GET['id_rol']) ? $_GET['id_rol'] : NULL;
        $accion = $_GET['accion'];
    }

    switch($accion){
        case 'new':
            require_once('formRoles.php');
            break;

        case 'add':
            $datosFormulario = $_POST;
            $consulta = $rol->insert($datosFormulario);
            $datosrol = $rol->read();
            require_once('vistaRoles.php');
            break;
            
        case 'update':
            $datosrol=$_POST;
            $datosActualizar=$rol->update($datosrol, $id_rol);
            $datosrol = $rol->read();
            require_once('vistaRoles.php');
            break;


        case 'modify':
            $datosrol = $rol->readOne($id_rol);
            if(is_array($datosrol)){
                require_once('formRoles.php');
            } else{
                /* $proveedor->message(0,"Ocurrio un error, el ponente no exixte"); */
                $datosrol = $rol->read();
                require_once('formRoles.php');
                }
            break;



        case 'delete':
            $rolElimi=$rol->delete($id_rol);
        default:
            $datosrol = $rol->read();
            require_once('vistaRoles.php');
    }
    require_once('../../../Componentes/footer.php');

?>