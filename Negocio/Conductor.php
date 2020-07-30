<?php 

require_once "Persistencia/Conexion.php";
require_once "Persistencia/ConductorDAO.php";

class Conductor{
    private $idConductor;
    private $nombre;
    private $correo;
    private $clave;
    private $telefono;
    private $foto;
    private $estado;
    private $ConductorDAO;
    private $Conexion;

    public function Conductor($idConductor = "", $nombre = "", $correo = "",  $clave = "", $telefono = "", $foto = "", $estado = ""){
        $this -> idConductor = $idConductor;
        $this -> nombre = $nombre;
        $this -> correo = $correo;
        $this -> clave = $clave;
        $this -> telefono = $telefono;
        $this -> foto = $foto;
        $this -> estado = $estado;
        $this -> ConductorDAO = new ConductorDAO($idConductor, $nombre, $correo, $clave, $telefono, $foto, $estado);
        $this -> Conexion = new Conexion();
    }
    /*
    *   Getters
    */
    public function getIdConductor(){
        return $this -> idConductor;
    }

    public function getNombre(){
        return $this -> nombre;
    }

    public function getCorreo(){
        return $this -> correo;
    }

    public function getTelefono(){
        return $this -> telefono;
    }

    public function getClave(){
        return $this -> clave;
    }

    public function getFoto(){
        return $this -> foto;
    }

    public function getEstado(){
        return $this -> estado;
    }


    /*
    *   Setters
    */
    public function setIdCliente($idCliente){
        $this -> idCliente = $idCliente;
    }

    public function setNombre($nombre){
        $this -> nombre = $nombre;
    }

    public function setCorreo($correo){
        $this -> correo = $correo;
    }

    public function setTelefono($telefono){
        $this -> telefono =  $telefono;
    }

    public function setClave($clave){
        $this -> clave = $clave;
    }

    public function setFoto($foto){
        $this -> foto = $foto;
    }

    public function setEstado($estado){
        $this -> Estado = $estado;
    }


    /* 
    *   methods
    */

    /**
     * Metodo de autenticación en el sistema
     * Devuelve True si el correo y la contraseña coinciden
     * Devuelve False de lo contrario
    */

    public function autenticar(){
        $this -> Conexion -> abrir();
        echo $this -> ConductorDAO -> autenticar();
        $this -> Conexion -> ejecutar( $this -> ConductorDAO -> autenticar());
        if($this -> Conexion -> numFilas() == 1){
            $res = $this -> Conexion -> extraer();
            $this -> idConductor = $res[0];
            $this -> estado = $res[1];
            $this -> Conexion -> cerrar();
            return True;
        }else{
            $this -> Conexion -> cerrar();
            return False;
        }
        
    }

    /**
     * Actualizar Nav información
     * Busca por el nombre, el correo y la imagen que tenga el usuario
     */
    public function getInfoNav(){
        $this -> Conexion -> abrir();
        $this -> Conexion -> ejecutar($this -> ConductorDAO -> getInfoNav());
        $res = $this -> Conexion -> extraer();
        $this -> nombre = $res[0];
        $this -> correo = $res[1];
        $this -> foto = $res[2];
        $this -> Conexion -> cerrar();
    }
    
    /**
     * Buscar si un correo ya existe
     */

    public function existeCorreo(){
        $this -> Conexion -> abrir();
        $this -> Conexion -> ejecutar( $this -> ConductorDAO -> existeCorreo());
        $this -> Conexion -> cerrar();
        return $this -> Conexion -> numFilas();
    }
}
?>