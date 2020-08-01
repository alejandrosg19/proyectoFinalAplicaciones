<?php

class PrecioDAO{
    private $idPrecio;
    private $pesoMaximo;
    private $pesoMinimo;
    private $precio;

    function PrecioDAO($idPrecio = "", $pesoMaximo = "", $pesoMinimo = "", $precio = ""){
        $this -> idPrecio = $idPrecio;
        $this -> pesoMaximo = $pesoMaximo;
        $this -> pesoMinimo = $pesoMinimo;
        $this -> precio = $precio;
    }

    function existePeso(){
        return "SELECT * 
                FROM precio
                WHERE 
                    pesoMinimo = " . $this -> pesoMinimo . " OR 
                    pesoMaximo = " . $this -> pesoMaximo . " OR 
                    pesoMinimo = " . $this -> pesoMaximo . " OR
                    pesoMaximo = " . $this -> pesoMinimo;
    }
    function insertar(){
        return "INSERT INTO precio (pesoMinimo, pesoMaximo, precio)
                VALUES (" . $this -> pesoMinimo . "," . $this -> pesoMaximo . "," . $this -> precio . ")";
    }
    public function filtroPaginado($str, $pag, $cant){
        return "SELECT idPrecio, pesoMinimo, pesoMaximo, precio 
                FROM precio
                WHERE precio.pesoMinimo like '%". $str ."%' OR precio.pesoMaximo like '%" . $str . "%' OR precio.precio like '%" . $str ."%'
                LIMIT " . (($pag - 1)*$cant) . ", " . $cant;
    }

    public function filtroCantidad($str){
        return "SELECT count(*) 
                FROM precio
                WHERE precio.pesoMinimo like '%". $str ."%' OR precio.pesoMaximo like '%" . $str . "%' OR precio.precio like '%" . $str ."%'";
    }
    public function getInfoBasic(){
        return "SELECT idPrecio, pesoMinimo, pesoMaximo, precio 
        FROM precio
        WHERE idPrecio = ". $this -> idPrecio;
    }
    public function actualizar(){
        return "UPDATE precio
                SET
                    pesoMinimo = '" . $this -> pesoMinimo . "',
                    pesoMaximo = '" . $this -> pesoMaximo . "',
                    precio = '" . $this -> precio . "'
                WHERE idPrecio = ". $this -> idPrecio;
    }
    public function deletePrecio(){
        return  "DELETE 
                FROM precio 
                WHERE idPrecio = " . $this -> idPrecio;
    }
}
?>