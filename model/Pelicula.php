<?php

class Pelicula {
    public $id;
    public $portada;
    public $titulo;
    public $director;
    public $reparto;
    public $sinopsis;
    public $duracion;
    public $fechas;

    function __construct($id, $portada, $titulo, $director, $reparto, $sinopsis, $duracion, $fechas) {
        $this->id = $id;
        $this->portada = $portada;
        $this->titulo = $titulo;
        $this->director = $director;
        $this->reparto = $reparto;
        $this->sinopsis = $sinopsis;
        $this->duracion = $duracion;
        $this->fechas = $fechas;
    }
}