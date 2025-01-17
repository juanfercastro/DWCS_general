<?php
include_once('conexionDB.php');
class Cliente{
    private int $cod_cliente;
    private string $nombre;
    private string $apellidos;
    private int $numero;
    private string $mail;

    public function __construct(string $nombre, string $apellidos, int $numero, string $mail, int $cod)
    {
        $this->cod_cliente = $cod;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->numero = $numero;
        $this->mail = $mail;
    }

    /**
     * Get the value of cod_cliente
     */ 
    public function getCod_cliente()
    {
        return $this->cod_cliente;
    }

    /**
     * Set the value of cod_cliente
     *
     * @return  self
     */ 
    public function setCod_cliente($cod_cliente)
    {
        $this->cod_cliente = $cod_cliente;

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
     * Get the value of apellidos
     */ 
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set the value of apellidos
     *
     * @return  self
     */ 
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get the value of numero
     */ 
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set the value of numero
     *
     * @return  self
     */ 
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get the value of mail
     */ 
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set the value of mail
     *
     * @return  self
     */ 
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }
}

class ClienteModel{
    
    public static function getClientes():array{
        $clientes = [];
        $pdo = ConexionDB::getConnexion();
        $sql = "SELECT cod_cliente, nombre, apellidos, numero, mail FROM cliente";
        try {
            $statement = $pdo->query($sql);
            foreach ($statement as $row) {
                $client = new Cliente($row['nombre'], 
                                    $row['apellidos'], 
                                    $row['numero'], 
                                    $row['mail'], 
                                    $row['cod_cliente']);
                $clientes[] = $client;
            }
        } catch (PDOException $th) {
            error_log("Error obteniendo los clientes. ".$th->getMessage());
        }finally{
            $pdo = null;
            $statement = null;
        }

        return $clientes;
    }

}