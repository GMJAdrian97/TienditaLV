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
         * Get the value of imagen
         */ 
        public function getImagen()
        {
                return $this->imagen;
        }

        /**
         * Set the value of imagen
         *
         * @return  self
         */ 
        public function setImagen($imagen)
        {
                $this->imagen = $imagen;

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
    }

    $proveedor = new Proveedor;

?>