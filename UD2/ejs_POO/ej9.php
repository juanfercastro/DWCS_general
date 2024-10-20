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

class Estudiante extends Persona{
    private int $grado;
    private array $calificaciones = array();

    public function __construct(string $nombre, int $edad, Direccion $direccion, int $grado, array $calificaciones)
    {
        $this->grado = $grado;
        $this->calificaciones = $calificaciones;
        parent::__construct($nombre, $edad, $direccion);
    }

    /**
     * Get the value of grado
     */ 
    public function getGrado()
    {
        return $this->grado;
    }

    /**
     * Set the value of grado
     *
     * @return  self
     */ 
    public function setGrado($grado)
    {
        $this->grado = $grado;

        return $this;
    }

    /**
     * Get the value of calificaciones
     */
    public function getCalificaciones()
    {
        return $this->calificaciones;
    }

    /**
     * Set the value of calificaciones
     *
     * @return  self
     */ 
    public function setCalificaciones($calificaciones)
    {
        $this->calificaciones = $calificaciones;

        return $this;
    }

    public function mostrarInformacion(){
        echo "Nombre: ". parent::getNombre().". Edad: ".parent::getEdad().". Grado: ".$this->grado;
    }

    public function addCalificacion(int $calificacion){
        $this->calificaciones[] = $calificacion;
        return $this;
    }

    public static function calcularPromedio(array $calificaciones){
        $longitud = count($calificaciones);
        $sumatorio = array_sum($calificaciones);
        $media = $sumatorio/$longitud;
        return $media;
    }
    public function mostrarMedia(){
        $resultado = Estudiante::calcularPromedio($this->calificaciones);
        echo "La media de las calificaciones es: $resultado";
    }
 
}

class Curso{
    private $estudiantes = array();

    public function __construct($estudiantes){
        $this->estudiantes = $estudiantes;
    }

    /**
     * Get the value of estudiantes
     */ 
    public function getEstudiantes()
    {
        return $this->estudiantes;
    }

    /**
     * Set the value of estudiantes
     *
     * @return  self
     */ 
    public function setEstudiantes($estudiantes)
    {
        $this->estudiantes = $estudiantes;

        return $this;
    }

    public function addEstudiante(Estudiante $estudiante){
        $this->estudiantes[] = $estudiante;
        return $this;
    }

    public function mostrarEstudiantes(){
        foreach ($this->estudiantes as $estudiante) {
            echo $estudiante->mostrarInformacion()."<br>";
        }
    }
}
$direc = new Direccion("fausto", "pontevedra", "36999");