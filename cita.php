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
    <link
			href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
			rel="stylesheet"
		/>

		<link rel="stylesheet" href="assets/css/estilos.css" />
    <title>Agendar cita</title>
</head>
<body>
    <h1 class="titulo-body">Bienvenido
        <?php echo ucfirst($_SESSION['usuario']); ?>
    </h1>
    <main>
			<div class="contenedor__todo">
				<div class="caja__trasera">
					<div class="caja__trasera-login">
						<h3>¿Ya tienes una cuenta?</h3>
						<p>Inicia sesión para entrar en la página</p>
						<button id="btn__iniciar-sesion">Iniciar Sesión</button>
					</div>
					<div class="caja__trasera-register">
						<h3>¿Ya tienes citas?</h3>
						<p>Aqui puedes revisar tus citas </p>
						<button id="btn__registrarse">Mirar</button>
                        <button class="btn_cerrar_sesion"><a href="php/usuario/cerrar_sesion.php">Cerrar sesion</a></button>
					</div>
				</div>

				<!--Formulario de Login y registro-->
				<div class="contenedor__login-register">
					<!--Login-->
					<form action="php/citas/registrar_cita.php" class="formulario__login" method="POST">
						<h2>Agendar cita</h2>
						<input class="in" type="date" name="fecha" placeholder="Fecha" />
						<input class="in" type="text" name="motivo" placeholder="Motivo" />
						<?php
                            // Incluyes tu conexión o usas la conexion del ejemplo
                            include 'php/conexion.php';
                            $conectar = new conexion();
                            $conectado = $conectar->conectar();

                            // Reset
                            $options = ''; // Va devolver tus options html ¡important! resetearlo

                            // Sentencia
                            $sql = "SELECT * FROM departamentos";

                            // Ejecutar consulta
                            if ($ejecutar = mysqli_query($conectado, $sql)) {

                                /* determinar el número de filas del resultado */
                                $numero_de_filas = mysqli_num_rows($ejecutar);
                                // Existen filas
                                if ($numero_de_filas > 0) {
                                    /* obtener array asociativo */
                                    while ($row = mysqli_fetch_assoc($ejecutar)) {
                                        // Creamos options html
                                        $options .= "<option value='{$row['iddepartamentos']}'>{$row['nombre']}</option>";
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

							<label for="funcionario">Area a la que requiere</label>
								<select name="funcionario" id="">
									<?php echo $options ?>
								</select>
							</label>
                        <h4 class="in">Registrar elemento</h4>
                        <input class="in" type="text" name="dispositivo" placeholder="Dispositivo" />
						<input class="in" type="text" name="marca" placeholder="Marca del dispositivo" />
						<input class="in"  type="number" name="cantidad" placeholder="Cantidad que ingresa" />
                        <div class="btn">
                            <button>Agendar</button>
					    </div>  
					</form>
				</div>
			</div>
		</main>
</body>
</html>