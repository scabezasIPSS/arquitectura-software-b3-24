<?php

class Objeto
{
    private $id;
    private $nombre;
    private $activo;

    public function __construct()
    {
    }

    //accesadores
    public function getId()
    {
        return $this->id;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function isActivo() //ocupamos is, pq es booleano
    {
        return $this->activo;
    }

    //mutadores
    public function setId($_n)
    {
        $this->id = $_n;
    }
    public function setNombre($_n)
    {
        $this->nombre = $_n;
    }
    public function setActivo($_n)
    {
        $this->activo = $_n;
    }
}
