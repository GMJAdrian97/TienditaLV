<?php
    require_once('../../sistema.php');

    class Proveedor extends sistema{
        public $id_marca;
        public $nombre;
        public $imagen;
        public $descripcion;
        public $telefono;
        public $direccion;



        /**
         * Get the value of id_marca
         */ 
        public function getId_marca()
        {
                return $this->id_marca;
        }

        /**
         * Set the value of id_marca
         *
         * @return  self
         */ 
        public function setId_marca($id_marca)
        {
                $this->id_marca = $id_marca;

                return $this;
        }

        /**
         * Get the value of nombre
         */ 
        public function getNombre()
        {
                return $this->nombre;
        }

        /**
         * Set the value of nombre
         *
         * @return  self
         */ 
        public function setNombre($nombre)
        {
                $this->nombre = $nombre;

                return $this;
        }

        /**
         * Get the value of descripcion
         */ 
        public function getDescripcion()
        {
                return $this->descripcion;
        }

        /**
         * Set the value of descripcion
         *
         * @return  self
         */ 
        public function setDescripcion($descripcion)
        {
                $this->descripcion = $descripcion;

                return $this;
        }

        /**
         * Get the value of telefono
         */ 
        public function getTelefono()
        {
                return $this->telefono;
        }

        /**
         * Set the value of telefono
         *
         * @return  self
         */ 
        public function setTelefono($telefono)
        {
                $this->telefono = $telefono;

                return $this;
        }

        /**
         * Get the value of direccion
         */ 
        public function getDireccion()
        {
                return $this->direccion;
        }

        /**
         * Set the value of direccion
         *
         * @return  self
         */ 
        public function setDireccion($direccion)
        {
                $this->direccion = $direccion;

                return $this;
        }



           /* Metodos CRUD */

           public function readOne($id_proveedor){
                $this->connect();
                $sql = "SELECT *
                        FROM proveedor
                        WHERE id_proveedor=:id_proveedor;";
                $stmt = $this->con->prepare($sql);
                $stmt->bindParam(':id_proveedor', $id_proveedor, PDO::PARAM_INT);
            $stmt->execute();
            $datosProveedor = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $datosProveedor = (isset($datosProveedor[0])) ? $datosProveedor[0] : null;
            return $datosProveedor;
            }

           public function read(){
            $this->connect();
            $sql = "SELECT *
                    FROM proveedor
                    ORDER BY id_proveedor";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datosProve = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $datosProve;
        }

        public function insert($datosFormulario){
                $this->connect();
                $sql="INSERT INTO proveedor(nombre, decripcion, telefono, direccion)
                        values(:nombre, :decripcion, :telefono, :direccion)";
                    $stmt = $this->con->prepare($sql);
                    $stmt -> bindParam(':nombre', $datosFormulario['nombre'], PDO::PARAM_STR);
                    $stmt -> bindParam(':decripcion', $datosFormulario['decripcion'], PDO::PARAM_STR);
                    $stmt -> bindParam(':telefono', $datosFormulario['telefono'], PDO::PARAM_INT);
                    $stmt -> bindParam(':direccion', $datosFormulario['direccion'], PDO::PARAM_STR);
                    $rs = $stmt->execute();
                    return  $stmt->rowCount();;
                }


        public function delete($id_proveedor){
                $this->connect();
                $sql = "DELETE FROM proveedor WHERE id_proveedor=:id_proveedor";
                $stmt = $this->con->prepare($sql);
                $stmt->bindParam(':id_proveedor', $id_proveedor, PDO::PARAM_INT);
                $rs = $stmt->execute();
                return $stmt->rowCount();
        }


        public function update($datosProveedor, $id_proveedor){
                $this->connect();
                $sql = "UPDATE proveedor set
                               nombre=:nombre,
                               decripcion=:decripcion, 
                               telefono=:telefono, 
                               direccion=:direccion
                        WHERE id_proveedor = :id_proveedor";
                    $stmt = $this->con->prepare($sql);
                    $stmt -> bindParam(':nombre', $datosProveedor['nombre'], PDO::PARAM_STR);
                    $stmt -> bindParam(':decripcion', $datosProveedor['decripcion'], PDO::PARAM_STR);
                    $stmt -> bindParam(':telefono', $datosProveedor['telefono'], PDO::PARAM_INT);
                    $stmt -> bindParam(':direccion', $datosProveedor['direccion'], PDO::PARAM_STR);
                    $stmt->bindParam(':id_proveedor', $id_proveedor, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return $stmt->rowCount();
            }
    }

    $proveedor = new Proveedor;

?>