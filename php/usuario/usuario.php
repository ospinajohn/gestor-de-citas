<?php

include '../conexion.php';
session_start();

class Usuario {
    public function registrar($nombre, $correo, $contraseña, $cedula, $empresa) {
        $conectar = new conexion();
        $conectado = $conectar->conectar();

        $sql = "INSERT INTO usuarios(nombre, correo, contraseña, cedula, rol,empresas_idempresas) VALUE ('$nombre', '$correo', '$contraseña','$cedula','visitante','$empresa')";

        $verificar_correo = mysqli_query($conectado, "SELECT * FROM usuarios WHERE correo='$correo'");

        if (mysqli_num_rows($verificar_correo) > 0) {
            echo '<script>
                alert("Este correo ya esta registrado. Vuelva a intentarlo con otro correo");
                window.location = "../../index.php"
                </script>';

            exit();
        }

        $verificar_cedula = mysqli_query($conectado, "SELECT * FROM usuarios WHERE cedula='$cedula'");

        if (mysqli_num_rows($verificar_correo) > 0) {
            echo '<script>
                alert("Este numero de cedula ya esta regristrado.");
                window.location = "../index.php"
                </script>';

            exit();
        }

        if (mysqli_query($conectado, $sql)) {
            echo '<script>
                alert("Nuevo registro creado con éxito");
                window.location = "../../index.php"
                </script>';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conectado);
        }

        $conectado->close();
    }

    public function login($correo, $contraseña, $rol) {
        $conectar = new conexion();
        $conectado = $conectar->conectar();
        //en mysqli_query tiene que ir el valor de la base de datos y la consulta
        $sql = mysqli_query($conectado, "SELECT * FROM $rol  WHERE correo='$correo' AND contraseña='$contraseña'");
        
        $sql2 = mysqli_query($conectado, "SELECT idusuarios  FROM usuarios  WHERE correo='$correo' AND contraseña='$contraseña'");

        $id = mysqli_fetch_array($sql2)['idusuarios'];
        $_SESSION['id'] = $id;

        $validar = mysqli_num_rows($sql);

        if (($validar > 0) && ($rol == "usuarios")) {
            if ($correo == 'admin@gmail.com') {
                $_SESSION['usuario'] = $correo;
                header("location: ../../admin.php");
                $_SESSION['rol'] = 'admin';
            } else {
                $_SESSION['usuario'] = $correo;
                header("location: ../../cita.php");
                $_SESSION['rol'] = 'usuario';
            }
            exit;
        } elseif (($validar > 0) && ($rol == "funcionarios")) {
            $_SESSION['usuario'] = $correo;
            // asignar_id($correo, "funcionarios", "idfuncionarios");
            header("location: ../../funcionario_inicio.php");
            $_SESSION['rol'] = 'funcionario';
            exit;
        } else {
            '<script>
                alert("Usuario y/o contraseña incorrecta");
                window.location = "../../index.php"
            </script>';
        }
        exit;

        // else error

        // $rol = $validar_login[2];

        // $_SESSION['rol'] = $rol;

        // if ($_SESSION['rol'] == 'admin') {
        //     // echo 'view/admin/admin.php';
        //     header("location: ../../admin.php");

        // } elseif ($_SESSION['rol'] == 'visitante') {
        //     // echo 'view/user/user.php';
        // }

        //aqui iria la redirecion segun su rol
    }

    public function asignar_id($correo, $rol, $id) {
        $conectar = new conexion();
        $conectado = $conectar->conectar();
        $sql = mysqli_query($conectado, "SELECT id FROM $rol WHERE correo = '$correo'");
        $_SESSION[$id] = mysqli_fetch_array($sql)['id'];
    }

}

?>