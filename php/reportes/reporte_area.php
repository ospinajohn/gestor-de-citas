<?php
    session_start();

    if (!isset($_SESSION['usuario'])) {
        echo '<script>
                alert("Por favor iniciar session");
                window.location = "index.php"
            </script>';
        session_destroy();
        // header("location: index.php");
        die();

    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Funcionarios</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>
</head>
<body>

    <header>

    </header>

    <main class="main-funcionario">

        <div class="form form-reporte">
            <div class="card w-100">
                <div class="card-header">
                    <h5 class="text-center">Reporte de visitantes</h5>
                </div>
                <div class="card-body">

                    <div class="card" style="width: 18rem;">
                        <img src="https://cdn-icons-png.flaticon.com/512/1055/1055644.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <?php
                            include '../conexion.php';
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
                                        echo "<h5 class='card-title text-center'>$row[usuario]</h5>";
                                        echo "<p class='card-text'><strong>$row[usuario]</strong> ha solicitado el area de <strong>$row[departamento]</strong>.</p>";
                                    }
                                }

                                $conectado->close();

                            ?>
                            
                          <a href="#" class="btn btn-info w-100" onclick="location.href='../../admin.php'">Volver</a>
                        </div>
                      </div>

                </div>
            </div>
        </div>

        <div class="lateral">
            <img src="https://images.unsplash.com/photo-1497032628192-86f99bcd76bc?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="">
        </div>

    </main>


</body>
</html>