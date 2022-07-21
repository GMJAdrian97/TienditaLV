<?php
    require_once('mdlUsuario.php');
    
    $id_usuario = NULL;
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_usuario = isset($_GET['id_usuario']) ? $_GET['id_usuario'] : NULL;
        $accion = $_GET['accion'];
    }
    switch($accion){
        case 'new':
            require_once('formUsuario.php');
        break;

        case 'add':
            $datos = $_POST;
            $resultado = $usuario->create($datos);
           $datos = $usuario->read();
            require_once('vistaUsuario.php');
        break;

        case 'modify':
            $datos = $usuario->readOne($id_usuario);
            $datosusu= $usuario->read();
            if(is_array($datos)){
                require_once('formUsuario.php');
            } else{
                $datosusu= $usuario->read();
                require_once('formUsuario.php');
            }
        break;

        case 'update':
            $datos=$_POST;
            $resultado=$usuario->update($datos,$id_usuario);
            $datos = $usuario->read();
            require_once('vistaUsuario.php');
            break;

        case 'delete':
            $datoelemiu=$usuario->delete($id_usuario);
            
        default:
            $datos = $usuario->read();
            require_once('vistaUsuario.php');
    }
    require_once('../../../Componentes/footer.php');
?>