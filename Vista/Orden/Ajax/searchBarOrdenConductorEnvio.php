<?php
$str = $_POST['search'];

$pagina = $_POST['page'];
$cantPag = $_POST['cantPag'];

$Orden = new Orden();
$data = $Orden -> filtroPaginadoConductor2($str, $pagina, $cantPag,$_SESSION["id"]);
$resultado = $Orden->filtroCantidadConductor2($str,$_SESSION["id"]);

$cant = $resultado / $cantPag;

$ajax = array(
    "status" => ((count($data) > 0)? true : false),
    "DataT" => $data,
    "Cpage" => $pagina,
    "DataP" => $cant
);
echo json_encode($ajax);
?>