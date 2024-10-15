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
}
?>