<?php
$idDespachador = $_POST['idDespachador'];
$estado = $_POST['estado'];

$despachador = new Despachador($idDespachador, "", "", "", "", "", $estado);

$res = $despachador -> updateEstado();
$despachador -> getInfoBasic();
$ajax = array();

if ($res == 1) {

    if ($_SESSION['rol'] == 1) {
        /**
         * Creo el objeto de log
         */
        $logAdministrador = new LogAdministrador("", getDateTime(), getBrowser(), getOS(), actualizarEstado("Despachador", $despachador -> getIdDespachador(), $despachador -> getNombre(), $despachador -> getEstado()), $_SESSION['id'], 10);
        /**
         * Inserto el registro del log
         */
        $logAdministrador -> insertar();
    }

    $ajax['status'] = true;
    $ajax['msj'] = "El estado ha sido actualizado correctamente";
} else {
    $ajax['status'] = false;
    $ajax['msj'] = "Hubo un inconveniente, por favor intente denuevo";
}
echo json_encode($ajax);