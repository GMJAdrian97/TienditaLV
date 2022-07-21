<?php
    require_once('../../sistema.php');

    class Roles extends sistema{
        public $id_rol;
        public $nombre;

        public function getId_rol()
        {
                return $this->id_rol;
        }


        public function setId_rol($id_rol)
        {
                $this->id_rol = $id_rol;

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

   public function readOne($id_rol){
    $this->connect();
    $sql = "SELECT *
            FROM rol
            WHERE id_rol=:id_rol;";
    $stmt = $this->con->prepare($sql);
    $stmt->bindParam(':id_rol', $id_rol, PDO::PARAM_INT);
$stmt->execute();
$datosrol = $stmt->fetchAll(PDO::FETCH_ASSOC);
$datosrol = (isset($datosrol[0])) ? $datosrol[0] : null;
return $datosrol;
}


public function read(){
$this->connect();
$sql = "SELECT *
        FROM rol
        ORDER BY id_rol";
$stmt = $this->con->prepare($sql);
$stmt->execute();
$datosrol = $stmt->fetchAll(PDO::FETCH_ASSOC);
return $datosrol;
}


public function insert($datosFormulario){
    $this->connect();
    $sql="INSERT INTO rol(nombre)
            values(:nombre)";
        $stmt = $this->con->prepare($sql);
        $stmt -> bindParam(':nombre', $datosFormulario['nombre'], PDO::PARAM_STR);
        $rs = $stmt->execute();
        return  $stmt->rowCount();;
    }


public function delete($id_rol){
    $this->connect();
    $sql = "DELETE FROM rol WHERE id_rol=:id_rol";
    $stmt = $this->con->prepare($sql);
    $stmt->bindParam(':id_rol', $id_rol, PDO::PARAM_INT);
    $rs = $stmt->execute();
    return $stmt->rowCount();
}


public function update($datosrol, $id_rol){
    $this->connect();
    $sql = "UPDATE rol set
                   nombre=:nombre
            WHERE id_rol = :id_rol";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':nombre', $datosrol['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':id_rol', $id_rol, PDO::PARAM_INT);
$rs = $stmt->execute();
return $stmt->rowCount();
}
}

$rol = new Roles;

?>