<?php
require "Conexion.php";

class Peliculas {
    public $peliculas;
    private $db;

    function __construct()
    {
        $this->db = new Database();
    }

    function obtProductoPorId($id)
    {
        $this->db->connect();
        $sql = "SELECT * FROM peliculas WHERE id = $id";
        $result = mysqli_query($this->db->conn, $sql);
        $pelicula = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $this->db->disconnect();
        return $pelicula;
    }

    function Ejecutar($sentencia, $op)
    {
        $this->db->connect();
        if($op == 0){
            $data = $this->db->EjecutarQuery($sentencia, $op);
            $this->db->disconnect();
            return $data;
        } else {
            $this->db->EjecutarQuery($sentencia, $op);
            $this->db->disconnect();
        }
    }

    function listarPeliculas()
    {
        $sentencia = "SELECT * FROM peliculas";
        $data = $this->Ejecutar($sentencia, 0);
        return $data;
    }

    function eliminar($id)
    {
        $this->db->connect();
        $sql = "DELETE FROM peliculas WHERE id = $id";
        $result = mysqli_query($this->db->conn, $sql);
        $this->db->disconnect();
        return $result;
    }

    function cambiar($id, $portada, $titulo, $director, $reparto, $sinopsis, $duracion, $fechas, $precio)
    {
        $this->db->connect();
        $sql = "UPDATE peliculas SET portada = '$portada', titulo = '$titulo', director = '$director', reparto = '$reparto', sinopsis = '$sinopsis', duracion = '$duracion', fechas = '$fechas', precio = '$precio' WHERE id = $id";
        $result = mysqli_query($this->db->conn, $sql);
        $this->db->disconnect();
        return $result;
    }

    function agregar($portada, $titulo, $director, $reparto, $sinopsis, $duracion, $fechas, $precio, $asientos)
    {
        $this->db->connect();
        $sql = "INSERT into peliculas (portada, titulo, director, reparto, sinopsis, duracion, fechas, precio, asientos) 
                VALUES ('$portada', '$titulo', '$director', '$reparto', '$sinopsis', '$duracion', '$fechas', '$precio', '$asientos')";
        $result = mysqli_query($this->db->conn, $sql);
        $this->db->disconnect();
        return $result;
    }
}
