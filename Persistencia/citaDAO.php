<?php 

class CitaDAO{
    private $idCita;
    private $fechaCita;
    private $idConductor;

    public function CitaDAO($idCita = "", $fechaCita = "", $idConductor=""){
        $this -> idCita = $idCita;
        $this -> fechaCita = $fechaCita;
        $this -> idConductor = $idConductor;
    }

    public function insertar(){
        return "INSERT INTO Cita (fechaCita, FK_idConductor) 
                VALUES ('" . $this -> fechaCita ."', '" . $this -> idConductor  ."')";
    }

    public function getInfoName(){
        return "SELECT idCita, fechaCita, nombre
                FROM cita
                INNER JOIN Conductor on FK_idConductor = idConductor
                WHERE idCita = " . $this -> idCita;
    }

}