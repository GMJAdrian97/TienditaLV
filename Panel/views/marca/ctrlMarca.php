<?php
    require_once('mdlMarca.php');
   
    $accion = NULL;
    if(isset($_GET['accion'])){
        $id_marca = isset($_GET['id_marca']) ? $_GET['id_marca'] : NULL;
        $accion = $_GET['accion'];
    }

    switch($accion){
        case 'new':
            require_once('formMarca.php');
            break;

        case 'add':
            $datosFormulario = $_POST;
            $consulta = $marca->insert($datosFormulario);
            $datosmarca = $marca->read();
            require_once('vistaMarca.php');
            break;
            
        case 'update':
            $datosmarca=$_POST;
            $datosActualizar=$marca->update($datosmarca, $id_marca);
            $datosmarca = $marca->read();
            require_once('vistaMarca.php');
            break;


        case 'modify':
            $datosmarca = $marca->readOne($id_marca);
            if(is_array($datosmarca)){
                require_once('formMarca.php');
            } else{
                /* $proveedor->message(0,"Ocurrio un error, el ponente no exixte"); */
                $datosmarca = $marca->read();
                require_once('formMarca.php');
                }
            break;



        case 'delete':
            $marcaElimi=$marca->delete($id_marca);
        default:
            $datosmarca = $marca->read();
            require_once('vistaMarca.php');
    }
    require_once('../../../Componentes/footer.php');

?>