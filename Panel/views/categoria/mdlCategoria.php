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

         public function readOne($id_categoria){
                $this->connect();
                $sql = "SELECT *
                        FROM categoria
                        WHERE id_categoria=:id_categoria;";
                $stmt = $this->con->prepare($sql);
                $stmt->bindParam(':id_categoria', $id_categoria, PDO::PARAM_INT);
            $stmt->execute();
            $datosCategoria = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $datosCategoria = (isset($datosCategoria[0])) ? $datosCategoria[0] : null;
            return $datosCategoria;
            }


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


        public function insert($datosFormulario){
                $this->connect();
                $sql="INSERT INTO categoria(nombre)
                        values(:nombre)";
                    $stmt = $this->con->prepare($sql);
                    $stmt -> bindParam(':nombre', $datosFormulario['nombre'], PDO::PARAM_STR);
                    $rs = $stmt->execute();
                    return  $stmt->rowCount();;
                }


        public function delete($id_categoria){
                $this->connect();
                $sql = "DELETE FROM categoria WHERE id_categoria=:id_categoria";
                $stmt = $this->con->prepare($sql);
                $stmt->bindParam(':id_categoria', $id_categoria, PDO::PARAM_INT);
                $rs = $stmt->execute();
                return $stmt->rowCount();
        }


        public function update($datosCategoria, $id_categoria){
                $this->connect();
                $sql = "UPDATE categoria set
                               nombre=:nombre
                        WHERE id_categoria = :id_categoria";
                    $stmt = $this->con->prepare($sql);
                    $stmt->bindParam(':nombre', $datosCategoria['nombre'], PDO::PARAM_STR);
                    $stmt->bindParam(':id_categoria', $id_categoria, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return $stmt->rowCount();
            }
    }

    $categoria = new Categoria;

?>