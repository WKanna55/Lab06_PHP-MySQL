<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $nombres = $_POST['txtNombres'];
    $apellidos = $_POST['txtApellidos'];
    $dni = $_POST['txtDNI'];
    $celular = $_POST['txtCelular'];
    $correo = $_POST['txtCorreo'];
    $direccion = $_POST['txtDireccion'];

    $sentencia = $bd->prepare("UPDATE alumnos SET nombres = ?, apellidos = ?, dni = ?, celular = ?, correo = ?, direccion = ? where id = ?;");
    $resultado = $sentencia->execute([$nombres, $apellidos, $dni, $celular, $correo, $direccion, $codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }