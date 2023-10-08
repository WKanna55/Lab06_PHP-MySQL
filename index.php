<?php include 'template/header.php' ?>

<?php
    include_once "model/conexion.php";
    $sentencia = $bd -> query("select * from alumnos");
    $alumno = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <!-- inicio alerta -->
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Rellena todos los campos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Registrado!</strong> Se agregaron los datos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   
            
            

            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Vuelve a intentar.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>

            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Cambiado!</strong> Los datos fueron actualizados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Eliminado!</strong> Los datos fueron borrados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 
            <!-- fin alerta -->

            <!-- Boton modal - registro -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Registrar
            </button>

            <!-- Modal - Registro -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ingresar datos:</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                        <div class="col-md-100">
                          <div class="card" style="width: 100%">
                              <div class="card-body">
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
                      </div>
                  </div>

                  
                </div>
              </div>
            </div>
            
            <!-- Tabla y su contenedor-->
            <div class="container-fluid overflow-x-scroll">
            
                <table class="table align-middle table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombres</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">DNI</th>
                            <th scope="col">Celular</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Fecha de Nacimiento</th>
                            <th scope="col">Fecha de Inscripcion</th>
                            <th scope="col">Grado</th>
                            <th scope="col" colspan="2">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach($alumno as $dato){ 
                        ?>
                        <tr>
                            <td scope="row"><?php echo $dato->id; ?></td>
                            <td><?php echo $dato->nombres; ?></td>
                            <td><?php echo $dato->apellidos; ?></td>
                            <td><?php echo $dato->dni; ?></td>
                            <td><?php echo $dato->celular; ?></td>
                            <td><?php echo $dato->correo; ?></td>
                            <td><?php echo $dato->direccion; ?></td>
                            <td><?php echo $dato->fecha_nacimiento; ?></td>
                            <td><?php echo $dato->fecha_inscripcion; ?></td>
                            <td><?php echo $dato->grado; ?></td>           
                            <td><a class="text-success" href="editar.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-pencil-square"></i></a></td>
                            <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-trash"></i></a></td>
                        </tr>
                        <?php 
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
</div>
        
<?php include 'template/footer.php' ?>