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
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Acutalizar cita</title>

	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" />

	<link rel="stylesheet" href="assets/css/estilos.css" />
</head>

<body>
	<main>
		<!--Formulario de Login y registro-->
			<div class="contenedor__login-register">
				<!--Login-->
				<form action="aceptar_cita.php" class="formulario__login" method="POST">
					<h2>Actualizar cita</h2>
					<?php
                        // Incluyes tu conexión o usas la conexion del ejemplo
                        include '../conexion.php';
                        $conectar = new conexion();
                        $conectado = $conectar->conectar();

                        // Reset
                        $options = ''; // Va devolver tus options html ¡important! resetearlo

                        // Sentencia
                        $sql = "SELECT * FROM visitas";

                        // Ejecutar consulta
                        if ($ejecutar = mysqli_query($conectado, $sql)) {

                            /* determinar el número de filas del resultado */
                            $numero_de_filas = mysqli_num_rows($ejecutar);
                            // Existen filas
                            if ($numero_de_filas > 0) {
                                /* obtener array asociativo */
                                while ($row = mysqli_fetch_assoc($ejecutar)) {
                                    // Creamos options html
                                    $options .= "<option value='{$row['idvisitas']}'>{$row['fecha']}</option>";
                                }

                                /* liberar el conjunto de resultados */
                                mysqli_free_result($ejecutar);
                                // No existe resultado
                            } else {
                                echo 'No se encontraron registros';
                            }
                        } else {
                            echo 'No se pudo ejecutar la consulta.';
                            // Imprimir fallo mysqli_error
                            printf("Error: %s\n", mysqli_error($conectado));
                        }

                    ?>

					<label for="id">Cita que desea aprobar</label>
					<select name="id" id="">
						<?php echo $options ?>
					</select>
					</label>
					<button>Aceptar</button>
				</form>
			</div>
		</div>
	</main>

	<script src="assets/js/script.js"></script>
</body>

</html>