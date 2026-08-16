<?php

class Persona
{

    private $nombre;
    private $apellidos;
    private $genero;

    public function __construct($nombre, $apellidos, $genero)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->genero = $genero;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function getApellidos()
    {
        return $this->apellidos;
    }
    public function getGenero()
    {
        return $this->genero;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

    }
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }
    public function setGenero($genero)
    {
        $this->genero = $genero;
    }
}
?>