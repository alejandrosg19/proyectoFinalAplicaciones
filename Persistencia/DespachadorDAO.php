<?php 

class DespachadorDAO{
    private $idDespachador;
    private $nombre;
    private $correo;
    private $clave;
    private $telefono;
    private $foto;
    private $estado;

    public function DespachadorDAO($idDespachador = "", $nombre = "", $correo = "", $clave = "" , $telefono = "", $foto = "", $estado = ""){
        $this -> idDespachador = $idDespachador;
        $this -> nombre = $nombre;
        $this -> correo = $correo;
        $this -> clave = $clave;
        $this -> telefono = $telefono;
        $this -> foto = $foto;
        $this -> estado = $estado;
    }

    /* 
    *   methods
    */

    public function autenticar(){
        return "SELECT idDespachador, estado
                FROM despachador 
                WHERE email = '" . $this -> correo . "' AND clave ='" . md5($this -> clave) . "'";
    }
    public function getInfoNav(){
        return "SELECT nombre, email, foto
                FROM despachador
                WHERE idDespachador = " . $this -> idDespachador;
    }
    public function existeCorreo(){
        return "SELECT idDespachador
                FROM despachador
                WHERE email = '" . $this -> correo . "'";
    }
    public function filtroPaginado($str, $pag, $cant){
        return "SELECT idDespachador, nombre, email, estado 
                FROM Despachador 
                WHERE Despachador.nombre like '%". $str ."%' OR Despachador.email like '%" . $str . "%'
                LIMIT " . (($pag - 1)*$cant) . ", " . $cant;
    }

    public function filtroCantidad($str){
        return "SELECT count(*) 
                FROM Despachador
                WHERE Despachador.nombre like '%". $str ."%'  OR Despachador.email like '%" . $str . "%'";
    }

    public function insertar(){
        return "INSERT INTO Despachador (nombre, telefono, email, clave, foto, estado) 
                VALUES ('" . $this -> nombre ."', '" . $this -> telefono  ."','" . $this -> correo  ."', '" . md5($this -> clave)  ."', '" . $this -> foto . "' ,'" . $this -> estado  ."')";
    }
    public function updateEstado(){
        return "UPDATE Despachador
                SET
                    estado = ". $this -> estado . "
                WHERE idDespachador = " . $this -> idDespachador;
    }

    public function getInfoBasic(){
        return "SELECT idDespachador, nombre, telefono, email, clave, foto, estado 
        FROM Despachador
        WHERE idDespachador = ". $this -> idDespachador;
    }
    
    public function existeNuevoCorreo($correo){
        return "SELECT idDespachador
                FROM Despachador
                WHERE email = '" . $correo . "'";
    }

    public function actualizarCClave(){
        return "UPDATE Despachador
                SET
                    nombre = '" . $this -> nombre . "',
                    telefono = '" . $this -> telefono . "',
                    email = '" . $this -> correo . "',
                    estado = '" . $this -> estado . "',
                    clave = '" . $this -> clave . "'
                WHERE idDespachador = ". $this -> idDespachador;
    }

    public function actualizar(){
        return "UPDATE Despachador
                SET
                    nombre = '" . $this -> nombre . "',
                    telefono = '" . $this -> telefono . "',
                    email = '" . $this -> correo . "',
                    estado = '" . $this -> estado . "'
                WHERE idDespachador = ". $this -> idDespachador;
    }
    
    public function actualizarBasic(){
        return "UPDATE Despachador
                SET
                    nombre = '" . $this -> nombre . "',
                    telefono = '" . $this -> telefono . "',
                    email = '" . $this -> correo . "',
                    foto = '" . $this -> foto . "'
                WHERE idDespachador = ". $this -> idDespachador;
    }

    public function actualizarBasicClave(){
        return "UPDATE Despachador
                SET
                    nombre = '" . $this -> nombre . "',
                    telefono = '" . $this -> telefono . "',
                    email = '" . $this -> correo . "',
                    clave = '" . $this -> clave . "',
                    foto = '" . $this -> foto . "'
                WHERE idDespachador = ". $this -> idDespachador;
    }
    public function despachadorLibre(){
        return "SELECT t.FK_idDespachador, COUNT(t.FK_idDespachador) as ordenes FROM(
                    SELECT * FROM estadoDespachador WHERE estadodespachador.FK_idAccionEstado != 7 GROUP BY(FK_idOrden) ORDER BY(FK_idOrden)) AS t
                GROUP BY(t.FK_idDespachador) ORDER BY(ordenes) ASC LIMIT 1";
    }
    public function traerDespachador(){
        return "SELECT idDespachador FROM despachador WHERE idDespachador NOT IN (
                    SELECT FK_idDespachador FROM estadodespachador) 
                ORDER BY(idDespachador) ASC LIMIT 1";
    }
}
