<?php

include 'funcionarios.php';

$id = $_POST['id'];


$registrar = new Funcionario();
$registrar->actualizar_cita($id);

?>