<?php
    require_once('../../sistema.php');

    class Categoria extends sistema{
        public $id_categoria;
        public $nombre;

  /**
         * Get the value of id_categoria
         */ 
        public function getId_categoria()
        {
                return $this->id_categoria;
        }

        /**
         * Set the value of id_categoria
         *
         * @return  self
         */ 
        public function setId_categoria($id_categoria)
        {
                $this->id_categoria = $id_categoria;

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
        

         /* Metodos CRUD */

         public function read(){
            $this->connect();
            $sql = "SELECT *
                    FROM categoria
                    ORDER BY id_categoria";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datosCategoria = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $datosCategoria;
        }
    }

    $categoria = new Categoria;

?>