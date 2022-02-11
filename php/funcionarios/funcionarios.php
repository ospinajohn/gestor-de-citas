<?php

session_start();
include '../conexion.php';

class Funcionario {
    public function registrar_funcionario($nombre, $apellido, $tele, $correo, $departamento,$contraseña) {

        $conectar = new conexion();
        $conectado = $conectar->conectar();

        $sql = "INSERT INTO funcionarios(nombre, apellido,rol, tele, correo,contraseña, departamentos_iddepartamentos) VALUE ('$nombre', '$apellido','funcionario', '$tele','$correo','$contraseña', '$departamento')";

// ELEMENTOS INGRESADOS
// SELECT elementos_ingresados.marca, elementos_ingresados.dispositivos, elementos_ingresados.cantidad FROM visitas
// INNER JOIN elementos_ingresados ON visitas.idvisitas = elementos_ingresados.visitas_idvisitas
// INNER JOIN usuarios ON usuarios.idusuarios = visitas.usuarios_idusuarios
// WHERE usuarios.correo = 'Jhon@gmail.com'

// VISITAS 
// SELECT usuarios.nombre FROM visitas
// INNER JOIN usuarios ON visitas.usuarios_idusuarios = usuarios.idusuarios
// WHERE DAY(visitas.fecha) LIKE 5

//AREAS
// SELECT usuarios.nombre as 'usuario', departamentos.nombre as 'departamento' FROM funcionarios
// INNER JOIN departamentos ON departamentos.iddepartamentos = funcionarios.departamentos_iddepartamentos
// INNER JOIN visitas ON funcionarios.idfuncionarios = visitas.funcionarios_idfuncionarios
// INNER JOIN usuarios ON visitas.usuarios_idusuarios = usuarios.idusuarios
// WHERE usuarios.correo = 'Jhon@gmail.com' 


        $verificar_correo = mysqli_query($conectado, "SELECT * FROM usuarios WHERE correo='$correo'");

        if (mysqli_num_rows($verificar_correo) > 0) {
            echo '<script>
                alert("Este correo ya esta registrado. Vuelva a intentarlo con otro correo");
                window.location = "../../admin.php"
                </script>';

            exit();
        }


        if (mysqli_query($conectado, $sql)) {
            echo '<script>
                alert("Nuevo registro creado con éxito");
                window.location = "../../admin.php"
                </script>';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conectado);
        }

        $conectado->close();
    }

    public function consultar_funcionario() {

        $C = new Conexion();
        $conn = $C->conectar();

        $sql = "select * from funcionarios";
        $resultado = $conn->query($sql);

        if ($resultado->num_rows > 0) {
            echo "<table border='1'>";
            echo "<thead> <tr>
            <td>ID</td>
            <td>NOMBRE</td>
            <td>APELLIDO</td>
            <td>TELEFONO</td>
            <td>AREA</td>
            </tr>";

            while ($row = $resultado->fetch_assoc()) {
                echo "<tr><td>$row[idfuncionarios]</td><td>$row[nombre]</td><td>$row[apellido]</td><td>$row[tele]</td><td>$row[departamentos_iddepartamentos]</td></tr>";
            }
            echo "</table>";
        } else {
            echo "No tiene resultado";
        }

        $conn->close();
    }

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
            <td>OPCIONES</td>
            </tr>";

            while ($row = $resultado->fetch_assoc()) {
                echo "<tr><td>$row[idvisitas]</td><td>$row[fecha]</td><td>$row[estado]</td><td>$row[usuarios_idusuarios]</td><td>$row[motivo]</td><td><a href='actualizar_cita.php'>Aprobar</a>  <a href='eliminar_alumno.html'>Eliminar</a></td></tr>";
            }
            echo "</table>";
        } else {
            echo "No tiene resultado";
        }

        $conn->close();
    }

    public function actualizar_cita($id) {

        $C = new Conexion();
        $conn = $C->conectar();

        $sql = "UPDATE visitas SET estado='aceptado' WHERE estado = 'pendiente' AND idvisitas = $id";
        $resultado = $conn->query($sql);

        if (mysqli_query($conn, $sql)) {
            echo '<script>
                alert("Se aprobo la visita con exito!!");
                window.location = "mostrar_citas.php"
                </script>';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        $conn->close();
    }

}