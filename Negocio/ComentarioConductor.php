<?php
require_once "Persistencia/Conexion.php";
require_once "Persistencia/ComentarioConductorDAO.php";

class ComentarioConductor{
    private $idComentarioConductor;
    private $fecha;
    private $comentario;
    private $idEstadoConductor;
    private $ComentarioConductorDAO;
    private $Conexion;

    public function ComentarioConductor($idComentarioConductor = "", $fecha = "", $comentario = "", $idEstadoConductor = ""){
        $this -> idComentarioConductor = $idComentarioConductor;
        $this -> fecha = $fecha;
        $this -> comentario = $comentario;
        $this -> idEstadoConductor = $idEstadoConductor;
        $this -> ComentarioConductorDAO = new ComentarioConductorDAO($this -> idComentarioConductor, $this ->  fecha, $this -> comentario, $this -> idEstadoConductor);
        $this -> Conexion = new Conexion();
    }

    /*
    *   Getters
    */
    public function getIdComentarioConductor(){
        return $this -> idComentarioConductor;
    }
    public function getFecha(){
        return $this ->  fecha;
    }
    public function getComentario(){
        return $this ->  comentario;
    }
    public function getIdEstadoConductor(){
        return $this -> idEstadoConductor;
    }

    /*
    *   Setters
    */

    public function setIdComentarioConductor($idComentarioConductor){
        $this -> idComentarioConductor = $idComentarioConductor;
    }
    public function setFecha($fecha){
        $this -> fecha = $fecha;
    }
    public function setComentario($comentario){
        $this -> comentario = $comentario;
    }
    public function setIdEstadoConductor($idEstadoConductor){
        $this -> idEstadoConductor = $idEstadoConductor;
    }
}
?>