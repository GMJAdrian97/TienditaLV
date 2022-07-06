<?php
    require_once('../../sistema.php');

    class Marca extends sistema{
        public $id_marca;
        public $nombre;
        public $imagen;


        public function getId_marca()
        {
                return $this->id_marca;
        }


        public function setId_marca($id_marca)
        {
                $this->id_marca = $id_marca;

                return $this;
        }

        public function getNombre()
        {
                return $this->nombre;
        }


        public function setNombre($nombre)
        {
                $this->nombre = $nombre;

                return $this;
        }

        public function getImagen()
        {
                return $this->imagen;
        }


        public function setImagen($imagen)
        {
                $this->imagen = $imagen;

                return $this;
        }


         /* Metodos CRUD */

         public function read(){
            $this->connect();
            $sql = "SELECT *
                    FROM marca
                    ORDER BY id_marca";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datosMarca = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $datosMarca;
        }
    }

    $marca = new Marca;

?>