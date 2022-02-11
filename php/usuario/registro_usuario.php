<?php

include 'usuario.php';

$contraseña = $_POST['contraseña'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$cedula = $_POST['cedula'];
$empresa = $_POST['empresa'];
// incritar contraseña
// $contraseña = hash('sha512', $contraseña);

$registrar = new Usuario();
$registrar->registrar($nombre, $correo, $contraseña, $cedula,$empresa);

?>