<?php
require_once "Persistencia/EstadoConductorDAO.php";

class EstadoConductor extends Estado{
    private $EstadoConductorDAO;

    public function EstadoConductor($idEstadoConductor = "", $fecha = "", $idAccionEstado = "", $idOrden = "", $idConductor = ""){
        parent::Estado($idEstadoConductor,$fecha,$idAccionEstado,$idOrden,$idConductor,2);
        $this -> EstadoConductorDAO = new EstadoConductorDAO($this -> idEstado, $this -> fecha, $this -> idAccionEstado, $this -> idOrden, $this -> idActor);
    }
}
?>