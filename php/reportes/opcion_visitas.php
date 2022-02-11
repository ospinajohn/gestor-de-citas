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

        <link rel="stylesheet" href="../../assets/css/style.css"/>
   

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>

   
    <title>Admin</title>
</head>
<body>
    <main class="main-funcionario">
        <div class="form form-registro">
            <div class="card w-100">
                <div class="card-header">
                    <h5 class="text-center">Reporte de visitantes</h5>
                </div >
                <div class="card-body">

                    <form action="datos_visita.php" method="post">
                        <div class="mb-3">
                            <label for="numero">Ingrese el dia, el mes o el años que quiere saber
                                </label>
                                <input type="number" name="numero" placeholder="Solo puede ingresar numeros" class="form-control" />
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="fecha" value="DAY"  id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Dia
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="fecha" value="WEEK" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Semana
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="fecha" value="MONTH" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Mes
                                </label>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-success w-100 ">
                                    <h1>Consultar</h1>
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="mb-3">
                    <button type="submit" class="btn btn-info w-100" onclick="location.href='../../admin.php'">
                        <h1>Volver</h1>
                    </button>
                    </div>
            </div>
        </div>
        <div class="lateral">
            <img src="https://images.unsplash.com/photo-1497032628192-86f99bcd76bc?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="">
        </div>
    </main>
</body>
</html>