<?php
include_once("conexionBD.php");

class Producto{
    private int $cod_producto;
    private string $denominacion;
    private string $descripcion;
    private float $precio;
    private int $cantidad;
    

    public function __construct(string $denominacion, float $precio, int $cantidad, string $descripcion=null, int $cod = null){
        if (isset($cod)) {
            $this->cod_producto = $cod;
        }
        $this->denominacion = $denominacion;
        if (isset($descripcion)) {
            $this->descripcion = $descripcion;
        }
        $this->precio = $precio;
        $this->cantidad = $cantidad;

    }

    /**
     * Get the value of cod_producto
     */ 
    public function getCod_producto()
    {
        return $this->cod_producto;
    }

    /**
     * Set the value of cod_producto
     *
     * @return  self
     */ 
    public function setCod_producto($cod_producto)
    {
        $this->cod_producto = $cod_producto;

        return $this;
    }

    /**
     * Get the value of denominacion
     */ 
    public function getDenominacion()
    {
        return $this->denominacion;
    }

    /**
     * Set the value of denominacion
     *
     * @return  self
     */ 
    public function setDenominacion($denominacion)
    {
        $this->denominacion = $denominacion;

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
     * Get the value of precio
     */ 
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     *
     * @return  self
     */ 
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get the value of cantidad
     */ 
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set the value of cantidad
     *
     * @return  self
     */ 
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }
}

class ProductoModel{
    public static function getProductos(){
        $productos = [];
        $db = ConexionBD::connection();
        $sql = "SELECT cod_producto, denominacion, descripcion, precio, cantidad FROM producto";
        try {
            $statement = $db->query($sql);
            foreach ($statement as $prod) {
                $prod = new Producto(
                    $prod['denominacion'],
                    $prod['precio'],
                    $prod['cantidad'],
                    $prod['descripcion'],
                    $prod['cod_producto']
                );
                $productos[] = $prod;
            }
        } catch (PDOException $e) {
            error_log("Error al obtener los productos".$e->getMessage());
        }finally{
            $db = null;
            $statement = null;
        }
        return $productos;
    }

    public static function addProducto($nombre, $descripcion, $precio, $cantidad){
        $toret = false;
        $db = ConexionBD::connection();
        $sql = "INSERT INTO producto (denominacion, descripcion, precio, cantidad) VALUES (:denominacion,:descripcion,:precio,:cantidad)";
        $statement = $db->prepare($sql);
        try {
            $statement->bindParam(':denominacion', $nombre, PDO::PARAM_STR);
            $statement->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
            $statement->bindParam(':precio', $precio);
            $statement->bindParam(':cantidad', $cantidad);
            $toret = $statement->execute();
        } catch (PDOException $e) {
            error_log("Error al añadir el producto".$e->getMessage());
            $toret = false;
        }finally{
            $db = null;
            $statement = null;
        }

        return $toret;
    }
}