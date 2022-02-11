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
    <title>Lista Citas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>


</head>
<body>
    <header>
        <div class="jumbotrom">
            <nav class="navegacion">
                <ul class="logo">
                    <li class="">
                        <a href="../../admin.php">Logo</a>
                    </li>
                </ul>

                <ul class="medio">
                    <li>
                        <a href="">Bienvenid@</a>
                    </li>
                    <li >
                        <a href=""><?php echo ucfirst($_SESSION['usuario']); ?></a>
                    </li>
                </ul>

                <ul class="login">
                    <li>
                        <a href="php/usuario/cerrar_sesion.php">Cerrar sesión</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="contenido container">
        <div class="card mt-2">
            <div class="card-header">
                <h1 class="text-center">Lista de citas</h1>
            </div>
            <div class="card-body">
                <table class="table mt-4">
                    <thead>
                    <tr class="text-center">
                        <th scope="col">ID</th>
                        <th scope="col">FECHA</th>
                        <th scope="col">ESTADO</th>
                        <th scope="col">USUARIO</th>
                        <th scope="col">MOTIVO</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                                include '../conexion.php';
                                $conectar = new conexion();
                                $conectado = $conectar->conectar();

                                // $sql = "select * from visitas";
                                $sql = "select * from visitas";
                                $resultado = $conectado->query($sql);

                                if ($resultado->num_rows > 0) {
                                    while ($row = $resultado->fetch_assoc()) {
                                       echo "<tr><td>$row[idvisitas]</td><td>$row[fecha]</td><td>$row[estado]</td><td>$row[usuarios_idusuarios]</td><td>$row[motivo]</td></tr>";
                                    }
                                    echo "</table>";
                                } else {
                                    echo "No tiene resultado";
                                }

                                $conectado->close();
                            ?>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


    </div>

</body>
</html>