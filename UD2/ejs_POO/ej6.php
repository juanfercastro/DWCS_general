<?php
class Direccion{
    private string $calle;
    private string $ciudad;
    private int $codigoPostal;

    public function __construct(string $calle, string $ciudad, int $codigoPost)
    {
        $this->calle = $calle;
        $this->ciudad = $ciudad;
        $this->codigoPostal = $codigoPost;
    }
    
    /**
     * Get the value of calle
     */ 
    public function getCalle()
    {
        return $this->calle;
    }

    /**
     * Set the value of calle
     *
     * @return  self
     */ 
    public function setCalle($calle)
    {
        $this->calle = $calle;

        return $this;
    }

    /**
     * Get the value of ciudad
     */ 
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Set the value of ciudad
     *
     * @return  self
     */ 
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    /**
     * Get the value of codigoPostal
     */ 
    public function getCodigoPostal()
    {
        return $this->codigoPostal;
    }

    /**
     * Set the value of codigoPostal
     *
     * @return  self
     */ 
    public function setCodigoPostal($codigoPostal)
    {
        $this->codigoPostal = $codigoPostal;

        return $this;
    }

    public function direccionComp(){
        return $this->calle.", ".$this->ciudad.", ".$this->codigoPostal;
    }
}
class Persona{
    protected string $nombre;
    protected int $edad;
    protected Direccion $direccion;

    public function __construct(string $nombre, int $edad, Direccion $direccion)
    {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->direccion = $direccion;
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
     * Get the value of edad
     */ 
    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * Set the value of edad
     *
     * @return  self
     */ 
    public function setEdad($edad)
    {
        if ($edad<0) {
            return "La edad debe ser un número positivo";
        }else{
            $this->edad = $edad;

            return $this;
        }
    }

    public function esMayorDeEdad(){
        if ($this->edad >= 18) {
            return true;
        }else{
            return false;
        }
    }

    public function direccion(){
        echo "Direccion: ".$this->direccion->direccionComp();
    }

}

class Profesor extends Persona{
    private string $especialidad;

    public function __construct($nombre, $edad, $direccion, $especializacion){
        $this->especialidad = $especializacion;
        parent::__construct($nombre, $edad, $direccion);
    }

    /**
     * Get the value of especialidad
     */ 
    public function getEspecialidad()
    {
        return $this->especialidad;
    }

    /**
     * Set the value of especialidad
     *
     * @return  self
     */ 
    public function setEspecialidad($especialidad)
    {
        $this->especialidad = $especialidad;

        return $this;
    }

    public function mostrarInformacion(){
        echo "<b>Nombre</b>: ".$this->nombre.". <b>Edad</b>: ".$this->edad.". <b>Especialidad</b>: ".$this->especialidad;
    }
}
$direc = new Direccion("fausto", "pontevedra", "36999");
$profe = new Profesor("José Ramón", 40, $direc, "Historia");
$profe->mostrarInformacion();