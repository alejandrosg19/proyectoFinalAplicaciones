<?php
$idAdministrador = $_SESSION['id'];

$administrador = new Administrador($idAdministrador);
$administrador->getInfoNav();
?>
<link rel="stylesheet" href="Static/css/nav.css">
<link rel="stylesheet" href="Static/css/table.css">
<link rel="stylesheet" href="Static/css/charts.css">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid d-flex flex-row justify-content-center">
        <div class="col-10 d-flex p-2">
            <div class="nav-sides nav-left">
                <a href="index.php?pid=<?php echo base64_encode("Vista/Administrador/mainAdministrador.php")?>">
                    <img src="Static/img/web/logo1.png" width="90px">
                </a>
                <div class="search">
                    <input type="text" placeholder="Search..">
                    <button>Search</button>
                </div>
            </div>
            <div class="nav-sides nav-right">
                <div class="user">
                    <div class="user-image" style="background-image: url(<?php echo ($administrador->getFoto() != "") ? $administrador->getFoto() : "Static/img/web/user.png"; ?>)">
                    </div>
                    <div class="user-info">
                        <span class="user-info-name"><?php echo ($administrador->getNombre() != "") ? $administrador->getNombre() : $administrador->getCorreo(); ?></span>
                        <span class="user-info-rol">Administrador</span>
                    </div>
                </div>
                <div class="menu-right nav-item dropdown show">
                    <a class="nav-link" href="#" id="navbarDropdown"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <i class="fas fa-th-large icon-style"></i>
                    </a>
                    <div class="dropdown-menu downInfoPersonal" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("Vista/Administrador/actualizarInfoAdministrador.php") ?>"><i class="fas fa-user-circle"></i> Actualizar Información</a>
                        <a class="dropdown-item" href="index.php?cerrarSesion=1"><i class="fas fa-sign-out-alt"></i> Cerrar Sesion</a>
                    </div>
                </div>
                <!--<a href="index.php?cerrarSesion=1"><i class="fas fa-sign-out-alt icon-style"></i></a>-->
            </div>
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #FFF !important; box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important">
    <div class="container-fluid d-flex flex-row justify-content-center">
        <div class="col-10 d-flex">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?pid=<?php echo base64_encode("Vista/Administrador/mainAdministrador.php")?>">Dashboards</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Order
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("Vista/Orden/listarOrdenAdministrador.php") ?>">Listar ordenes</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            States
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("Vista/Precio/listarPrecio.php") ?>">Precios</a>
                            <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("Vista/AccionEstado/listarAccionEstado.php") ?>">Acción</a>
                            <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("Vista/Envio/listarEnvioAdministrador.php") ?>">Envios</a>
                            <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("Vista/Cita/listarCitaAdministrador.php") ?>">Citas</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Users
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("Vista/Cliente/listarCliente.php") ?>">Cliente</a>
                            <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("Vista/Conductor/listarConductor.php") ?>">Conductor</a>
                            <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("Vista/Despachador/listarDespachador.php") ?>">Despachador</a>
                            <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("Vista/Administrador/listarAdministrador.php") ?>">Administrador</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Security
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("Vista/Security/listarLog.php") ?>">Log</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<div id="alert-ajax">

</div>