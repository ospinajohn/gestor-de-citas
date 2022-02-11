<?php

include 'reportes.php';

$fecha = $_POST['fecha'];
$numero = $_POST['numero'];


$registrar = new Reporte();
$registrar->visitantes($fecha,$numero);

?>