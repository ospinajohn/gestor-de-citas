<?php

include 'usuario.php';

$correo = $_POST['correo'];
$contraseña = $_POST['contraseña'];
$rol = $_POST['rol'];

$registrar = new Usuario();
$registrar->login($correo, $contraseña, $rol);

?>