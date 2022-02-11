<?php

include 'funcionarios.php';

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$tele = $_POST['telefono'];
$correo = $_POST['correo'];
$departamento = $_POST['departamento'];
$contraseña = $_POST['contraseña'];

$registrar = new Funcionario();
$registrar->registrar_funcionario($nombre, $apellido, $tele,$correo, $departamento,$contraseña);

?>