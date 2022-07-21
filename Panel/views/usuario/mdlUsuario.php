<?php
    require_once('../../sistema.php');

    class Usuario extends sistema{
        public $id_usuario;
        public $correo;
        public $pass;

        /**
         * Get the value of id_usuario
         */ 
        public function getId_usuario()
        {
                return $this->id_usuario;
        }

        /**
         * Set the value of id_usuario
         *
         * @return  self
         */ 
        public function setId_usuario($id_usuario)
        {
                $this->id_usuario = $id_usuario;

                return $this;
        }

        /**
         * Get the value of correo
         */ 
        public function getCorreo()
        {
                return $this->correo;
        }

        /**
         * Set the value of correo
         *
         * @return  self
         */ 
        public function setCorreo($correo)
        {
                $this->correo = $correo;

                return $this;
        }

        /**
         * Get the value of pass
         */ 
        public function getPass()
        {
                return $this->pass;
        }

        /**
         * Set the value of pass
         *
         * @return  self
         */ 
        public function setPass($pass)
        {
                $this->pass = $pass;

                return $this;
        }
        public function read(){
            $this->connect();
            $sql = "SELECT * from usuario";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $datos; 
        }
    
        /**
         * Retornar solo un ponente
         * @integger id_ponente
         * @return  array
         */ 
        public function readOne($id_usuario){
            $this->connect();
            $sql = "SELECT * from usuario u
                    WHERE u.id_usuario=:id_usuario;";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $stmt->execute();
            $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $datos = (isset($datos[0]))?$datos[0]:null;
            return $datos;
        }
        public function create($datos){
            $this->connect();
            $sql="INSERT INTO usuario (correo, pass) 
            VALUES (:correo, :pass)";
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':correo', $datos['correo'], PDO::PARAM_STR);
            $stmt -> bindParam(':pass', $datos['pass'], PDO::PARAM_STR);
            $rs = $stmt->execute();
            return  $stmt->rowCount();
        }
    
        public function update($datos, $id_usuario){
            $this->connect();
            $sql = "UPDATE usuario SET 
            correo = :correo,
            pass=:pass
             WHERE id_usuario = :id_usuario";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(":correo",$datos['correo'], PDO::PARAM_STR);
            $stmt->bindParam(":pass",$datos['pass'], PDO::PARAM_STR);
            $stmt->bindParam(":id_usuario",$id_usuario, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return  $stmt->rowCount();
    
        }
    
        public function delete($id_usuario){
            $this -> connect();
            $sql="DELETE FROM usuario WHERE id_usuario=:id_usuario";
            $stmt=$this->con->prepare($sql);
            $stmt -> bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $rs = $stmt->execute();
            return $stmt->rowCount();
            
        }
    
    
        public function credentials($correo){
            $_SESSION['correo'] = $correo;
            $sql = "SELECT r.rol
                    from rol r inner join usuario_rol u on r.id_rol=u.id_rol 
                    INNER JOIN usuario us on u.id_usuario= us.id_usuario 
                    where us.correo= :correo" ;
            $stmt = $this->con->prepare($sql);
            $stmt -> bindParam(':correo', $correo, PDO::PARAM_STR);
            $stmt->execute();
            $datos=array();
            $_SESSION['roles']=array();
            $datos=$stmt -> fetchAll(PDO::FETCH_ASSOC);
            foreach($datos as $key => $value){
                array_push($_SESSION['roles'],$value['rol']);
            }
            $_SESSION['validado'] = true;
        }
    }
    $usuario= new Usuario;
    ?>