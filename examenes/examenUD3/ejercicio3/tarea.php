<?php
class Tarea{
    private DateTimeImmutable $fecha;
    private string $texto;

    function __construct($fecha, $texto)
    {
        $this->fecha = $fecha;
        $this->texto = $texto;
    }

    /**
     * Get the value of fecha
     */ 
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */ 
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of texto
     */ 
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * Set the value of texto
     *
     * @return  self
     */ 
    public function setTexto($texto)
    {
        $this->texto = $texto;

        return $this;
    }

    public function getFechaFormateada(){
        return $this->fecha->format('d/m/Y H:i');
    }
}