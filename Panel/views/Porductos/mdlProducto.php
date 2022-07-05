<?php
    require_once('../../sistema.php');

    class Producto extends sistema{
        public $id_producto;
        public $nombre;
        public $imagen;
        public $medida;
        public $precio;
        public $stock;
        public $costo;
        public $descripcion;
        public $qr;
        public $id_marca;
        public $id_categoria;
        public $id_porveedor;

         /* Geters & Seters */

        public function getId_producto(){
            return $this->id_producto;
        }

        public function setId_producto($id_producto){
            $this->id_producto = $id_producto;
            return $this;
        }


        public function getNombre(){
            return $this->nombre;
        }

    
        public function setNombre($nombre){
            $this->nombre = $nombre;
            return $this;
        }


        public function getImagen(){
            return $this->imagen;
        }


        public function setImagen($imagen){
            $this->imagen = $imagen;
            return $this;
        }

      
        public function getMedida(){
           return $this->medida;
        }


        public function setMedida($medida){
            $this->medida = $medida;
            return $this;
        }

        public function getPrecio()
        {
            return $this->precio;
        }


        public function setPrecio($precio){
            $this->precio = $precio;
            return $this;
        }


        public function getStock(){
            return $this->stock;
        }

        public function setStock($stock){
            $this->stock = $stock;
            return $this;
        }

        public function getCosto(){
            return $this->costo;
        }

        public function setCosto($costo){
            $this->costo = $costo;
            return $this;
        }

        public function getDescripcion(){
            return $this->descripcion;
        }

        public function setDescripcion($descripcion){
            $this->descripcion = $descripcion;
            return $this;
        }


        public function getQr(){
            return $this->qr;
        }

        public function setQr($qr){
            $this->qr = $qr;
            return $this;
        }

        public function getId_marca(){
            return $this->id_marca;
        }

        public function setId_marca($id_marca)
        {
            $this->id_marca = $id_marca;
            return $this;
        }

        public function getId_categoria(){
            return $this->id_categoria;
        }

        public function setId_categoria($id_categoria){
            $this->id_categoria = $id_categoria;
            return $this;
        }

        public function getId_porveedor(){
            return $this->id_porveedor;
        }

        public function setId_porveedor($id_porveedor){
            $this->id_porveedor = $id_porveedor;
            return $this;
        }

         /* Geters & Seters */

         /* Metodos CRUD */

        public function read(){
            $this->connect();
            $sql = "SELECT p.id_producto,
                            p.nombre,
                            p.imagen,
                            p.medida,
                            p.precio,
                            p.stock,
                            p.costo,
                            p.descripcion,
                            p.qr,
                            (m.nombre) as marca,
                            (c.nombre) as categoria,
                            (pr.nombre) as proveedor
                    FROM producto p
                    INNER JOIN marca m ON m.id_marca = p.id_marca
                    INNER JOIN categoria c ON c.id_categoria = p.id_categoria
                    INNER JOIN proveedor pr ON pr.id_proveedor = p.id_proveedor
                    ORDER BY id_producto";
            $stmt = $this->con->prepare($sql);
            $stmt->execute();
            $datosProducto = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $datosProducto;
        }
        public function insert(){
            $this->connect();
            $archivo = $this->cargarImagen("imagen", "../../../Images/");
                if(is_null($archivo)){
            $sql="INSERT INTO producto(nombre,medida,precio,stock,costo,descripcion,qr,id_marca,id_categoria,id_proveedor)
            values(:nombre,:medida,:precio,:stock,:costo,:descripcion,:qr,:id_marca,:id_categoria,:id_proveedor)";
            } else{
                $sql="INSERT INTO producto(nombre,imagen,medida,precio,stock,costo,descripcion,qr,id_marca,id_categoria,id_proveedor)
                values(:nombre,:imagen,:medida,:precio,:stock,:costo,:descripcion,:qr,:id_marca,:id_categoria,:id_proveedor)";
            
                $stmt = $this->con->prepare($sql);
                $stmt -> bindParam(':nombre', $datosProducto['nombre'], PDO::PARAM_STR);
                $stmt -> bindParam(':medida', $datosProducto['medida'], PDO::PARAM_STR);
                $stmt -> bindParam(':precio', $datosProducto['precio'], PDO::PARAM_STR);
                $stmt -> bindParam(':stock', $datosProducto['stock'], PDO::PARAM_INT);
                $stmt -> bindParam(':costo', $datosProducto['costo'], PDO::PARAM_STR);
                $stmt -> bindParam(':descripcion', $datosProducto['descripcion'], PDO::PARAM_STR);
                $stmt -> bindParam(':qr', $datosProducto['qr'], PDO::PARAM_STR);
                $stmt -> bindParam(':id_marca', $datosProducto['id_marca'], PDO::PARAM_INT);
                $stmt -> bindParam(':id_categoria', $datosProducto['id_categoria'], PDO::PARAM_INT);
                $stmt -> bindParam(':id_proveedor', $datosProducto['id_proveedor'], PDO::PARAM_INT);
                if(!is_null($archivo)){
                    $stmt -> bindParam(':imagen', $archivo, PDO::PARAM_STR);
                }
                
                $rs = $stmt->execute();
                return  $stmt->rowCount();;
            }
        }
    }

    $producto = new Producto;
?>