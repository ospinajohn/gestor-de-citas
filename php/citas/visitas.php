<?php

session_start();
include '../conexion.php';

class Cita {
    public function registrar_cita($fecha, $motivo, $funcionario, $dispositivo, $marca, $cantidad) {
        $conectar = new conexion();
        $conectado = $conectar->conectar();

        $id = $_SESSION['id'];

        $sql = "INSERT INTO visitas(fecha, estado, motivo,funcionarios_idfuncionarios,usuarios_idusuarios	) VALUE ('$fecha','pendiente','$motivo','$funcionario',$id)";

        $sql2 = mysqli_query($conectado, "SELECT idvisitas  FROM visitas  WHERE usuarios_idusuarios='$id'");

        $id_cita = mysqli_fetch_array($sql2)['idvisitas'];

        $sql3 = mysqli_query($conectado, "INSERT INTO elementos_ingresados(dispositivos, marca, cantidad,visitas_idvisitas) VALUE ('$dispositivo','$marca','$cantidad','$id_cita')");
        // $verificar_correo = mysqli_query($conectado, "SELECT * FROM usuarios WHERE correo='$correo'");

        // if (mysqli_num_rows($verificar_correo) > 0) {
        //     echo '<script>
        //         alert("Este correo ya esta registrado. Vuelva a intentarlo con otro correo");
        //         window.location = "../index.php"
        //         </script>';

        //     exit();
        // }

        // $verificar_cedula = mysqli_query($conectado, "SELECT * FROM usuarios WHERE cedula='$cedula'");

        // if (mysqli_num_rows($verificar_correo) > 0) {
        //     echo '<script>
        //         alert("Este numero de cedula ya esta regristrado.");
        //         window.location = "../index.php"
        //         </script>';

        //     exit();
        // }

        if (mysqli_query($conectado, $sql)) {
            echo '<script>
                alert("Su cita ha sido agendad con exito, muchas gracias");
                window.location = "../../cita.php"
                </script>';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conectado);
        }

        $conectado->close();
    }
}

?>