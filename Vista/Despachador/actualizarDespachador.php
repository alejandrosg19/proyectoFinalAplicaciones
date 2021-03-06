<?php
$idDespachador = "";

$idDespachador = $_GET['idDespachador'];


if (isset($_POST['actualizarDespachador'])) {

    $nombreCompleto = trim($_POST['nombre']);
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $clave = $_POST['clave'];
    $estado = $_POST['estado'];


    $Cliente = new Cliente("", "", $email);
    $Administrador = new Administrador("", "", $email);
    $Conductor = new Conductor("", "", $email);
    $Despachador = new Despachador($idDespachador);
    $Despachador->getInfoBasic();

    if ($Despachador->getCorreo() != $email && ($Cliente->existeCorreo() || $Administrador->existeCorreo() || $Conductor->existeCorreo() || $Despachador->existeNuevoCorreo($email))) {
        $msj = "El correo proporcionado ya se encuentra en uso.";
        $class = "alert-danger";
    } else {

        $copyDespachador = $Despachador;
        $Despachador = new Despachador($idDespachador, $nombreCompleto, $email, md5($clave), $telefono, "", $estado);

        if ($clave != "" ) {
            $res = $Despachador -> actualizarCClave();
        } else {
            $res = $Despachador -> actualizar();
            $Despachador -> setClave($copyDespachador -> getClave());
        }

        if ($res == 1) {
            $msj = "El despachador se ha actualizado satisfactoriamente.";

            if ($_SESSION['rol'] == 1) {
                /**
                 * Creo el objeto de log
                 */
                $logAdministrador = new LogAdministrador("", getDateTime(), getBrowser(), getOS(), actualizarDespachador($copyDespachador -> getIdDespachador(), $copyDespachador -> getNombre(), $copyDespachador -> getTelefono(), $copyDespachador -> getCorreo(), $copyDespachador -> getClave(), $copyDespachador -> getEstado(), $Despachador -> getIdDespachador(), $Despachador -> getNombre(), $Despachador -> getTelefono(), $Despachador -> getCorreo(), $Despachador ->getClave(), $Despachador -> getEstado()), $_SESSION['id'], 11);
                /**
                 * Inserto el registro del log
                 */
                $logAdministrador -> insertar();
            }

            $class = "alert-success";
        } else if ($res == 0) {
            $msj = "No hubo ningún cambio.";
            $class = "alert-warning";
        } else {
            $msj = "Ocurrió algo inesperado, intente de nuevo.";
            $class = "alert-danger";
        }

        $Despachador = new Despachador($idDespachador);
        $Despachador->getInfoBasic();
    }

    include "Vista/Main/alert.php";

} else {

    $Despachador = new Despachador($idDespachador);
    $Despachador->getInfoBasic();

}
?>

<div class="container mt-5 mb-5">

    <div class="row justify-content-center mt-5">
        <div class="col-11 col-md-12 col-lg-9 col-xl-8 form-bg">
            <div class="card">
                <div class="card-body">
                    <div class="form-title">
                        <h1>Actualizar Despachador</h1>
                    </div>
                    <div class="row d-flex flex-row justify-content-center mb-4">
                        <div style="border-radius: 500px; overflow:hidden; width: 200px; height: 200px; background-image: url('<?php echo ($Despachador->getFoto() != "") ? $Despachador->getFoto() : "static/img/web/basic.png"; ?>'); background-repeat: no-repeat; background-position: center; background-size: cover;">
                        </div>
                    </div>
                    <form class="needs-validation" novalidate action="index.php?pid=<?php echo base64_encode("Vista/Despachador/actualizarDespachador.php") ?>&idDespachador=<?php echo $Despachador->getIdDespachador() ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Nombre Completo</label>
                            <input class="form-control" name="nombre" type="text" placeholder="Ingrese su nombre" value="<?php echo $Despachador->getNombre() ?>" required>
                            <div class="invalid-feedback">
                                Por favor ingrese el nombre.
                            </div>
                            <div class="valid-feedback">
                                ¡Enhorabuena!
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Teléfono</label>
                            <input class="form-control" name="telefono" type="text" placeholder="Ingrese el teléfono de contacto" value="<?php echo $Despachador->getTelefono() ?>" required>
                            <div class="invalid-feedback">
                                Por favor ingrese el teléfono de contacto.
                            </div>
                            <div class="valid-feedback">
                                ¡Enhorabuena!
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Estado</label>
                            <select name="estado" class="form-control" required>
                                <option value="" selected disabled>-- Estado --</option>
                                <option value="1" <?php echo ($Despachador->getEstado() == 1) ? "selected" : ""; ?>>Activado</option>
                                <option value="0" <?php echo ($Despachador->getEstado() == 0) ? "selected" : ""; ?>>Bloqueado</option>
                            </select>
                            <div class="invalid-feedback">
                                Por favor seleccione un estado.
                            </div>
                            <div class="valid-feedback">
                                ¡Enhorabuena!
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" name="email" type="email" placeholder="Ingrese su correo" value="<?php echo $Despachador->getCorreo() ?>" required>
                            <div class="invalid-feedback">
                                Por favor ingrese el correo.
                            </div>
                            <div class="valid-feedback">
                                ¡Enhorabuena!
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input class="form-control" name="clave" type="password" value="" placeholder="Ingrese su contraseña">
                        </div>
                        <div>
                            <button class="btn btn-primary w-100" name="actualizarDespachador" type="submit"> Actualizar Despachador </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>