<?php


// session_start();

include 'visitas.php';

$fecha = $_POST['fecha'];
$motivo = $_POST['motivo'];
$funcionario = $_POST['funcionario'];
$dispositivo = $_POST['dispositivo'];
$marca = $_POST['marca'];
$cantidad = $_POST['cantidad'];
// $usuario = intval($_SESSION['idusuarios']);

$registrar = new Cita();
$registrar->registrar_cita($fecha, $motivo, $funcionario, $dispositivo, $marca, $cantidad);

?>