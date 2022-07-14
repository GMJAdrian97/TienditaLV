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

         public function readOne($id_marca){
                $this->connect();
                $sql = "SELECT *
                        FROM marca
                        WHERE id_marca=:id_marca;";
                $stmt = $this->con->prepare($sql);
                $stmt->bindParam(':id_marca', $id_marca, PDO::PARAM_INT);
            $stmt->execute();
            $datosmarca = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $datosmarca = (isset($datosmarca[0])) ? $datosmarca[0] : null;
            return $datosmarca;
            }


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


        public function insert($datosFormulario){
                $this->connect();
                $sql="INSERT INTO marca(nombre)
                        values(:nombre)";
                    $stmt = $this->con->prepare($sql);
                    $stmt -> bindParam(':nombre', $datosFormulario['nombre'], PDO::PARAM_STR);
                    $rs = $stmt->execute();
                    return  $stmt->rowCount();;
                }


        public function delete($id_marca){
                $this->connect();
                $sql = "DELETE FROM marca WHERE id_marca=:id_marca";
                $stmt = $this->con->prepare($sql);
                $stmt->bindParam(':id_marca', $id_marca, PDO::PARAM_INT);
                $rs = $stmt->execute();
                return $stmt->rowCount();
        }


        public function update($datosmarca, $id_marca){
                $this->connect();
                $sql = "UPDATE marca set
                               nombre=:nombre
                        WHERE id_marca = :id_marca";
                    $stmt = $this->con->prepare($sql);
                    $stmt->bindParam(':nombre', $datosmarca['nombre'], PDO::PARAM_STR);
                    $stmt->bindParam(':id_marca', $id_marca, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return $stmt->rowCount();
            }
    }

    $marca = new Marca;

?>