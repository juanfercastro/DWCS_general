<?php
include_once('conexionDB.php');
class Producto{
    private int $id_producto;
    private string $denominacion;
    private string $descripcion;
    private float $precio;
    private int $cantidad;

    public function __construct(string $denominacion, string $descripcion, float $precio, int $cantidad, int $id)
    {
        $this->id_producto = $id;
        $this->denominacion = $denominacion;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->cantidad = $cantidad;
    }

    /**
     * Get the value of id_producto
     */ 
    public function getId_producto()
    {
        return $this->id_producto;
    }

    /**
     * Set the value of id_producto
     *
     * @return  self
     */ 
    public function setId_producto($id_producto)
    {
        $this->id_producto = $id_producto;

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
    
    public static function getProductos():array{
        $productos = [];
        $pdo = ConexionDB::getConnexion();
        $sql = "SELECT cod_producto, denominacion, descripcion, precio, cantidad FROM producto";
        try {
            $statement = $pdo->query($sql);
            foreach ($statement as $product) {
                $prod = new Producto($product['denominacion'], 
                                    $product['descripcion'], 
                                    $product['precio'], 
                                    $product['cantidad'], 
                                    $product['id']);
                $productos[] = $prod;
            }
        } catch (PDOException $th) {
            error_log("Error obteniendo los productos. ".$th->getMessage());
        }finally{
            $pdo = null;
            $statement = null;
        }

        return $productos;
    }
}