<?php

include '../conexion.php';
session_start();

class Reporte {
    public function visitantes($fecha, $numero) {
        $conectar = new conexion();
        $conectado = $conectar->conectar();

        $sql = "SELECT usuarios.nombre FROM visitas
        INNER JOIN usuarios ON visitas.usuarios_idusuarios = usuarios.idusuarios
        WHERE $fecha(visitas.fecha) LIKE $numero";

        $resultado = $conectado->query($sql);

        $datos = mysqli_fetch_array($resultado);

        if ($datos > 0) {
            while ($row = $resultado->fetch_assoc()) {
                echo "El usuario es: " . $row['nombre'];
                echo "<br>";
            }
        }
        echo "<a href='../../admin.php'>Inicio</a>";

        // echo (
        //     $datos['nombre']
        // );

        $conectado->close();
    }

    public function area() {
        $conectar = new conexion();
        $conectado = $conectar->conectar();

        $sql = "SELECT usuarios.nombre as 'usuario', departamentos.nombre as 'departamento' FROM funcionarios
        INNER JOIN departamentos ON departamentos.iddepartamentos = funcionarios.departamentos_iddepartamentos
        INNER JOIN visitas ON funcionarios.idfuncionarios = visitas.funcionarios_idfuncionarios
        INNER JOIN usuarios ON visitas.usuarios_idusuarios = usuarios.idusuarios";

        $resultado = $conectado->query($sql);

        $datos = mysqli_fetch_array($resultado);

        if ($datos > 0) {
            while ($row = $resultado->fetch_assoc()) {
                echo "El usuario es: " . $row['usuario']. " el departamento que solicito: " . $row['departamento']; 
                echo "<br>";
            }
        }
        echo "<a href='../../admin.php'>Inicio</a>";


        $conectado->close();
    }

    public function elemento() {
        $conectar = new conexion();
        $conectado = $conectar->conectar();

        $sql = "SELECT elementos_ingresados.marca as 'Marca', elementos_ingresados.dispositivos as 'Dispositivo', elementos_ingresados.cantidad as 'Cantidad' FROM visitas
INNER JOIN elementos_ingresados ON visitas.idvisitas = elementos_ingresados.visitas_idvisitas
INNER JOIN usuarios ON usuarios.idusuarios = visitas.usuarios_idusuarios";

        $resultado = $conectado->query($sql);
        
        if (mysqli_num_rows($resultado) > 0) {
            while ($row = mysqli_fetch_array($resultado)) {
                echo "La marca es: " . $row['Marca']. " el dispositivo que ingreso es : " . $row['Dispositivo']. "canditad: ". $row['Dispositivo'];
                echo "<br>";
            }echo "<a href='../../admin.php'>Inicio</a>";
        
        }else{
            echo 'No existen registro';
        }


        $conectado->close();
    }
}