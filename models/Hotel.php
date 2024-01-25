<?php

class Hotel {

    public $idHotel;
    public $nombre;
    public $descripcion;
    public $url;
    public $categoria;
    public $telefono;

    public function __construct($args = [])
    {
        $this->idHotel = $args["idHotel"] ?? null;
        $this->nombre = $args["nombre"] ?? "";
        $this->descripcion = $args["descripcion"] ?? "";
        $this->url = $args["url"] ?? "";
        $this->categoria = $args["categoria"] ?? 0;
        $this->telefono = $args["telefono"] ?? "";
    }
}