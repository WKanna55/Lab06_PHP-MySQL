<?php
//print_r($_POST);
if (empty($_POST["oculto"]) || empty($_POST["txtNombres"]) || empty($_POST["txtApellidos"]) || empty($_POST["txtDNI"]) || empty($_POST["txtCelular"]) || empty($_POST["txtCorreo"]) || empty($_POST["txtDireccion"]) || empty($_POST["txtFechaNacimiento"]) || empty($_POST["txtFechaInscripcion"]) || empty($_POST["txtGrado"])) {
    header('Location: index.php?mensaje=falta');
    exit();
}

include_once 'model/conexion.php';
$nombres = $_POST['txtNombres'];
$apellidos = $_POST['txtApellidos'];
$dni = $_POST['txtDNI'];
$celular = $_POST['txtCelular'];
$correo = $_POST['txtCorreo'];
$direccion = $_POST['txtDireccion'];
$fecha_nacimiento = $_POST['txtFechaNacimiento'];
$fecha_inscripcion = $_POST['txtFechaInscripcion'];
$grado = $_POST['txtGrado'];


$sentencia = $bd->prepare("INSERT INTO alumnos(nombres, apellidos, dni, celular, correo, direccion, fecha_nacimiento, fecha_inscripcion, grado) VALUES (?,?,?,?,?,?,?,?,?);");
$resultado = $sentencia->execute([$nombres, $apellidos, $dni, $celular, $correo, $direccion, $fecha_nacimiento, $fecha_inscripcion, $grado]);

if ($resultado === TRUE) {
    header('Location: index.php?mensaje=registrado');
} else {
    header('Location: index.php?mensaje=error');
    exit();
}