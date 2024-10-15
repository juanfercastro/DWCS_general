<?php
class Persona{
    private string $nombre;
    private int $edad;

    public function __construct(string $nombre, int $edad)
    {
        $this->nombre = $nombre;
        $this->edad = $edad;
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
}
$wey = new Persona("Federico", 89);
echo $wey->setEdad(-5)."<br>";
$wey->setEdad(17);
echo $wey->esMayorDeEdad();

?>