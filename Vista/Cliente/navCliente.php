<?php

    $idCliente = $_SESSION['id'];

    $cliente = new Cliente($idCliente);
    $cliente -> getInfoNav();


?>
<link rel="stylesheet" href="Static/css/nav.css">
<link rel="stylesheet" href="Static/css/table.css">
<link rel="stylesheet" href="Static/css/charts.css">
<link rel="stylesheet" href="Static/css/timeline.css">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid d-flex flex-row justify-content-center">
        <div class="col-10 d-flex p-2">
            <div class="nav-sides nav-left">
                <a href="index.php?pid=<?php echo base64_encode("Vista/Cliente/mainCliente.php")?>">
                    <img src="Static/img/web/logo1.png" width="90px">
                </a>
                <div class="search">
                    <input type="text" placeholder="Search..">
                    <button>Search</button>
                </div>
            </div>
            <div class="nav-sides nav-right">
            <div class="user">
                    <div class="user-image" style="background-image: url(<?php echo ($cliente -> getFoto() != "")? $cliente -> getFoto(): "Static/img/web/user.png" ; ?>)">
                    </div>
                    <div class="user-info">
                        <span class="user-info-name"><?php echo ($cliente -> getNombre() != "")? $cliente -> getNombre() : $cliente -> getCorreo(); ?></span>
                        <span class="user-info-rol">Cliente</span>
                    </div>
                </div>
                <div class="dropdown">
                    <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-th-large icon-style"></i>
                    </a>
                    <div class="dropdown-menu downInfoPersonal" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("Vista/Cliente/actualizarInfoCliente.php")?>"><i class="fas fa-user-circle"></i> Actualizar Información</a>
                        <a class="dropdown-item" href="index.php?cerrarSesion=1"><i class="fas fa-sign-out-alt"></i> Cerrar Sesion</a>
                    </div>
                </div>
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
                        <a class="nav-link" href="index.php?pid=<?php echo base64_encode("Vista/Cliente/mainCliente.php")?>">Dashboards</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?pid=<?php echo base64_encode("Vista/Orden/crearOrden.php") ?>">Create Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?pid=<?php echo base64_encode("Vista/Orden/listarOrdenCliente.php") ?>">My Orders</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<div id="alert-ajax">

</div>