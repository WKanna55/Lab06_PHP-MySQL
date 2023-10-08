<?php include 'template/header.php' ?>

<?php
include_once "model/conexion.php";
$sentencia = $bd->query("select * from alumnos");
$alumno = $sentencia->fetchAll(PDO::FETCH_OBJ);
//print_r($persona);
?>

<div class="col-md-4">
    <div class="card">
        <div class="card-header">
            Ingresar datos:
        </div>
        <form class="p-4" method="POST" action="registrar.php">
            <div class="mb-3">
                <label class="form-label">Nombres: </label>
                <input type="text" class="form-control" name="txtNombres" autofocus required>
            </div>
            <div class="mb-3">
                <label class="form-label">Apellidos: </label>
                <input type="text" class="form-control" name="txtApellidos" autofocus required>
            </div>
            <div class="mb-3">
                <label class="form-label">DNI: </label>
                <input type="text" class="form-control" name="txtDNI" autofocus required>
            </div>
            <div class="mb-3">
                <label class="form-label">Celular: </label>
                <input type="text" class="form-control" name="txtCelular" autofocus required>
            </div>
            <div class="mb-3">
                <label class="form-label">Correo: </label>
                <input type="text" class="form-control" name="txtCorreo" autofocus required>
            </div>
            <div class="mb-3">
                <label class="form-label">Direccion: </label>
                <input type="text" class="form-control" name="txtDireccion" autofocus required>
            </div>
            <div class="mb-3">
                <label class="form-label">Fecha Nacimiento: </label>
                <input type="date" class="form-control" name="txtFechaNacimiento" autofocus required>
            </div>
            <div class="mb-3">
                <label class="form-label">Fecha Inscripcion: </label>
                <input type="date" class="form-control" name="txtFechaInscripcion" autofocus required>
            </div>
            <div class="mb-3">
                <label class="form-label">Grado: </label>
                <input type="text" class="form-control" name="txtGrado" autofocus required>
            </div>
            <div class="d-grid">
                <input type="hidden" name="oculto" value="1">
                <input type="submit" class="btn btn-primary" value="Registrar">
            </div>
        </form>
    </div>
</div>

<?php include 'template/footer.php' ?>