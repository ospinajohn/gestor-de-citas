<?php

    session_start();

    if (isset($_SESSION['rol']) && $_SESSION['rol'] = 'usuario') {
        header("location: cita.php");
    } elseif (isset($_SESSION['rol']) && $_SESSION['rol'] = 'admin') {
        header("location: admin.php");
    } elseif (isset($_SESSION['rol']) && $_SESSION['rol'] = 'funcionario') {
        header("location: funcionario_inicio.php");
    }

    session_destroy();
?>



<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Soporte-TI</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@100;400&family=Roboto:ital@1&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/estilos.css" />
</head>

<body>
	<h1 class="titulo-body">Bienvenido a web Soportes Tecnológicos LT
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
					<h3>¿Aún no tienes una cuenta?</h3>
					<p>Regístrate para que puedas iniciar sesión</p>
					<button id="btn__registrarse">Regístrarse</button>
				</div>
			</div>

			<!--Formulario de Login y registro-->
			<div class="contenedor__login-register">
				<!--Login-->
				<form action="php/usuario/login.php" class="formulario__login" method="POST">
					<h2 class="">Iniciar Sesión</h2>
					<input class="email" type="email" name="correo" placeholder="Correo Electronico" />
					<input type="password" name="contraseña" placeholder="Contraseña" />
					<div class="u-form-radio-button-wrapper opciones">
						<div class="opcion">
							
							<label class="u-label" for="rol">Administrador</label>
							<input type="radio" name="rol" value="usuarios" />
						</div>

						<div class="opcion">
							
							<label class="u-label" for="rol">Funcionario</label>
							<input type="radio" name="rol" value="funcionarios" />
						</div>

		

						<div class="opcion">

							<label class="u-label" for="rol">Visitante</label>
							<input type="radio" name="rol" value="usuarios" />
						</div>
					
					</div>
					<div class="btn">
						<button>Entrar</button>
					</div>
					
				</form>

				<!--Register-->
				<form action="php/usuario/registro_usuario.php" class="formulario__register" method="POST">
					<h2 class="titulo">Regístrarse</h2>
					<input type="text" class="in" name="nombre" placeholder="Nombre completo" />
					<input type="email" class="in" name="correo" placeholder="Correo Electronico" />
					<input type="password" class="in" name="contraseña" placeholder="Contraseña" />
					<input type="text" name="cedula" placeholder="Numero de cedula" />
					<?php
					// Incluyes tu conexión o usas la conexion del ejemplo
					include 'php/conexion.php';
					$conectar = new conexion();
					$conectado = $conectar->conectar();

					// Reset
					$options = ''; // Va devolver tus options html ¡important! resetearlo

					// Sentencia
					$sql = "SELECT * FROM empresas";

					// Ejecutar consulta
					if ($ejecutar = mysqli_query($conectado, $sql)) {

						/* determinar el número de filas del resultado */
						$numero_de_filas = mysqli_num_rows($ejecutar);
						// Existen filas
						if ($numero_de_filas > 0) {
							/* obtener array asociativo */
							while ($row = mysqli_fetch_assoc($ejecutar)) {
								// Creamos options html
								$options .= "<option value='{$row['idempresas']}'>{$row['nombre']}</option>";
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
					
					<div class="empresa">
						<label class="" for="empresa">Empresa a la que respresenta</label>
						<select name="empresa" id="">
							<?php echo $options ?>
						</select>
					</div>

					</label>
					<div class="btn">
						<button>Regístrarse</button>
					</div>
				</form>
			</div>
		</div>
	</main>

	<script src="assets/js/script.js"></script>
</body>

</html>