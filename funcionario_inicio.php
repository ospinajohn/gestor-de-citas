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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/style.css" />
    <title>Funcionarios</title>
</head>
<body>
    <header>

        <div class="jumbotrom">
            <nav class="navegacion">
                <ul class="logo">
                    <li class="">
                        <a href="admin.php">Logo</a>
                    </li>
                </ul>

                <ul class="medio">
                    <li>
                        <a href="">Sobre nosotros</a> 
                    </li>
                    <li >
                        <a href="">Contacto</a> 
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
    <main class="main-func">
        <div class="container mt-2 boton">
            <div class="btn-funcionario">
                <form action="php/funcionarios/mostrar_citas.php" method="POST">
                    <input type="submit" class=" btn btn-info w-100"  value="Mostrar citas">
                </form>
            </div>
        </div>
    </main>
</body>
</html>