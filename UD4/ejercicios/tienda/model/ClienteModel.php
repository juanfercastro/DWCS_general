<?php

class Cliente{
    private int $cod_cliente;
    private string $nombre;
    private string $apellidos;
    private string $telefono;
    private string $mail;

    public function __construct(string $nombre, string $apellidos, string $telefono, string $mail, int $id=null){
        if (isset($id)) {
            $this->cod_cliente = $id;
        }
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->telefono = $telefono;
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
     * Get the value of telefono
     */ 
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set the value of telefono
     *
     * @return  self
     */ 
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

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
        $db = ConexionBD::connection();
        $sql = "SELECT cod_cliente, nombre, apellidos, telefono, mail FROM cliente";
        try {
            $statement = $db->query($sql);
            foreach ($statement as $row) {
                $cliente = new Cliente(
                    $row['nombre'],
                    $row['apellidos'],
                    $row['telefono'],
                    $row['mail'],
                    $row['cod_cliente']
                );
                $clientes[] = $cliente;
            }
        } catch (PDOException $th) {
            error_log("Error al cargar los clientes".$th->getMessage());
        }finally{
            $db = null;
            $statement = null;
        }
        return $clientes;
    }

    public static function addCliente(Cliente $c){
        $flag = false;
        $db = ConexionBD::connection();
        $sql = "INSERT INTO cliente(nombre, apellidos, telefono, mail) VALUES (?,?,?,?)";
        $statement = $db->prepare($sql);
        try {
            $statement->bindValue(1,$c->getNombre(),PDO::PARAM_STR);
            $statement->bindValue(2,$c->getApellidos(),PDO::PARAM_STR);
            $statement->bindValue(3,$c->getTelefono());
            $statement->bindValue(4,$c->getMail());
            $flag = $statement->execute();
        } catch (PDOException $th) {
            error_log("Error al añadir el cliente".$th->getMessage());
            $flag = false;
        }finally{
            $db=null;
            $statement=null;
        }

        return $flag;
    }
}