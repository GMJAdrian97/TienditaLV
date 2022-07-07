<?php
    require_once('mdlCategoria.php');
   
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_categoria = isset($_GET['id_categoria']) ? $_GET['id_categoria'] : NULL;
        $accion = $_GET['accion'];
    }

    switch($accion){
        case 'new':
            require_once('formCategoria.php');
            break;

        case 'add':
            $datosFormulario = $_POST;
            $consulta = $categoria->insert($datosFormulario);
            $datosCategoria = $categoria->read();
            require_once('vistaCategoria.php');
            break;
            
        case 'update':
            $datosCategoria=$_POST;
            $datosActualizar=$categoria->update($datosCategoria, $id_categoria);
            $datosCategoria = $categoria->read();
            require_once('vistaCategoria.php');
            break;


        case 'modify':
            $datosCategoria = $categoria->readOne($id_categoria);
            if(is_array($datosCategoria)){
                require_once('formCategoria.php');
            } else{
                /* $proveedor->message(0,"Ocurrio un error, el ponente no exixte"); */
                $datosCategoria = $categoria->read();
                require_once('formCategoria.php');
                }
            break;



        case 'delete':
            $categoriaElimi=$categoria->delete($id_categoria);
        default:
            $datosCategoria = $categoria->read();
            require_once('vistaCategoria.php');
    }
    require_once('../../../Componentes/footer.php');

?>