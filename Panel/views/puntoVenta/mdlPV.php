<?php
    require_once('../../sistema.php');

    class Ventas extends Sistema{
 

        public function readQR($nombreProdu){
            $this->connect();
            $sql = "SELECT p.id_producto,
                           p.nombre,
                           p.precio
                    FROM producto p
                    WHERE p.nombre = :nombre";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':nombre', $nombreProdu, PDO::PARAM_STR);
            $stmt->execute();
            $datosProducto = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $datosProducto = (isset($datosProducto[0])) ? $datosProducto[0] : null;
            return $datosProducto;
        }

        public function readID_C($correoUS){
            $this->connect();
            $sql = "SELECT cl.id_cliente
                    FROM cliente cl
                    INNER JOIN usuario u on cl.id_usuario = u.id_usuario
                    WHERE u.correo = :correo";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':correo', $correoUS, PDO::PARAM_STR);
            $stmt->execute();
            $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $datos;
        }

        public function createC($id_cliente){
            $this->connect();
            $sql = "INSERT INTO compras (
                                    id_cliente,
                                    fecha)
                            VALUES (:id_cliente,
                                    now())";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return  $stmt->rowCount();
        }

        public function create($id_cliente,$id_producto,$mediopago,$stockP){
            $this->connect();
            $this->con->beginTransaction();
            try{
                $sql = "INSERT INTO compras (id_cliente,fecha)
                                VALUES (:id_cliente,now())";
                $stmt = $this->con->prepare($sql);
                $stmt -> bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
                $rs = $stmt->execute();
                if ($stmt->rowCount()>0) {

                    $sql =  "SELECT * FROM compras WHERE id_cliente = :id_cliente";
                    $stmt = $this->con->prepare($sql);
                    $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
                    $rs = $stmt->execute();
                    //Traemos arreglo de todas la compras mediante el ID_compra
                    $clienteS = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    //Asignamos siempre el la ultima posiscion del arrgle de las compras 
                    $cliente = end($clienteS);
                    /* Detalle Pago */
                    $sql = "INSERT INTO detalle_pago(id_compra, id_tipoP)
                                VALUES(:id_compra, :id_tipoP)";
                    $stmt = $this->con->prepare($sql);
                    $stmt->bindParam(':id_compra',$cliente['id_compra'] , PDO::PARAM_INT);
                    $stmt->bindParam(':id_tipoP', $mediopago, PDO::PARAM_INT);
                    $rs = $stmt->execute();
                    /* Detalle Pago */
                    $sql = "INSERT INTO detalle_compra(id_compra, id_producto, cantidad)
                                    VALUES(:id_compra, :id_producto, :cantidad)";
                    $stmt = $this->con->prepare($sql);
                    $stmt->bindParam(':id_compra',$cliente['id_compra'] , PDO::PARAM_INT);
                    $stmt->bindParam(':id_producto', $id_producto, PDO::PARAM_INT);
                    $stmt->bindParam(':cantidad', $stockP, PDO::PARAM_INT);
                    $rs = $stmt->execute();
                    if ($stmt->rowCount()>0) {
                        $this->con->commit();
                        return true;
                    }
                }
                $this->con->rollback();
                return false;
            }catch (Exception $e){
                $this->con->rollback();
                return false;
                }

            return false;
        }

        public function addCart($id_cliente,$id_producto,$stockP,$subtotal){
            $this->connect();
            $sql = "INSERT INTO cart (
                                    id_cliente,
                                    id_producto,
                                    stock,
                                    subtotal)
                            VALUES (:id_cliente,
                                    :id_producto,
                                    :stock,
                                    :subtotal)";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
            $stmt -> bindParam(':id_producto', $id_producto, PDO::PARAM_INT);
            $stmt -> bindParam(':stock', $stockP, PDO::PARAM_INT);
            $stmt -> bindParam(':subtotal', $subtotal, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return  $stmt->rowCount();
            
        }


    }

    $ventas = new Ventas;
    
?>