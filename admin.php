<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    echo '<script>
                alert("Por favor iniciar session");
                window.location = "index.php"
            </script>';

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
    <!-- <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" /> -->
	<!-- <link rel="stylesheet" href="assets/css/estilos.css" /> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/style.css" />
    <title>Admin</title>
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
    <main>
         <div class="opciones container mt-2">
             <div class="grupo1">

                    <form action="php/admin/mostrar.php" method="POST">
                     <input type="submit" class=" btn btn1" value="Mostrar citas">
                    </form>

                    <form action="php/funcionarios/mostrar.php" method="POST">
                        <input type="submit" class=" btn btn2" value="Mostrar funcionarios">
                    </form>

                    <form action="php/funcionarios/registrar_funcionario.php" method="POST">
                        <input type="submit" class=" btn btn3" value="Registrar funcionarios">
                    </form>

                </div>
                <div class="grupo2">

                    <form action="php/reportes/opcion_visitas.php" method="POST">
                        <input type="submit" class=" btn btn4" value="Mostrar reporte de visitantes">
                    </form>
                    <form action="php/reportes/reporte_area.php"" method="POST">
                    <input type="submit" class=" btn btn5" value="Mostrar reporte de áreas ">
                </form>
                <form action="php/reportes/reporte_elementos.php" method="POST">
                    <input type="submit" class=" btn btn6" value="Mostrar reporte de elementos ingresados">
                </form>
            </div>
            <!-- <button class="btn_cerrar_sesion"><a href="php/usuario/cerrar_sesion.php">Cerrar sesion</a></button> -->
            
        </div>
    </main>
</body>
</html>