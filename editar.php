<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['codigo'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $bd->prepare("select * from Alumnos where id = ?;");
    $sentencia->execute([$codigo]);
    $alumno = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<div class="container mt-1 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Editar datos:</h3>
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Nombres: </label>
                        <input type="text" class="form-control" name="txtNombres" required 
                        value="<?php echo $alumno->nombres; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellidos: </label>
                        <input type="text" class="form-control" name="txtApellidos" autofocus required
                        value="<?php echo $alumno->apellidos; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">DNI: </label>
                        <input type="text" class="form-control" name="txtDNI" autofocus required
                        value="<?php echo $alumno->dni; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Celular: </label>
                        <input type="text" class="form-control" name="txtCelular" autofocus required
                        value="<?php echo $alumno->celular; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Correo: </label>
                        <input type="text" class="form-control" name="txtCorreo" autofocus required
                        value="<?php echo $alumno->correo; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Direccion: </label>
                        <input type="text" class="form-control" name="txtDireccion" autofocus required
                        value="<?php echo $alumno->direccion; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $alumno->id; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>
