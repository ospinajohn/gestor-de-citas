<?php

session_start();
include '../conexion.php';

class Admin {
    public function consultar_cita() {

        $C = new Conexion();
        $conn = $C->conectar();

// $sql = "select * from visitas";
        $sql = "select * from visitas";
        $resultado = $conn->query($sql);

        if ($resultado->num_rows > 0) {
            echo "<table border='1'>";
            echo "<thead> <tr>
            <td>ID</td>
            <td>FECHA</td>
            <td>ESTADO</td>
            <td>USUARIO</td>
            <td>MOTIVO</td>
            </tr>";

            while ($row = $resultado->fetch_assoc()) {
                echo "<tr><td>$row[idvisitas]</td><td>$row[fecha]</td><td>$row[estado]</td><td>$row[usuarios_idusuarios]</td><td>$row[motivo]</td></tr>";
            }
            echo "</table>";
        } else {
            echo "No tiene resultado";
        }

        $conn->close();
    }

}
