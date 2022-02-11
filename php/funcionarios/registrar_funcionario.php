<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Funcionarios</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>
</head>
	<body>
		<main class="main-funcionario">
			<div class="form form-registro">
				<div class="card w-100">
					<div class="card-header">
                    	<h5 class="text-center">Registrar Funcionario</h5>
                	</div>
				<div class="card-body">
					<form action="datos_registro_funcionario.php" class="formulario__register" method="POST">
						<div class="mb-3">
							<input type="text" name="nombre" placeholder="Nombre" />
						</div>
						<div class="mb-3">
							<input type="text" name="apellido" placeholder="Palleido" />
						</div>
						<div class="mb-3">
							<input type="text" name="telefono" placeholder="Telefono" />
						</div>
						<div class="mb-3">
							<input type="email" name="correo" placeholder="Correo Electronico" />
						</div>
						<div>
							<input type="password" name="contraseña" placeholder="Contraseña" />
						</div>
						<div class="mb-3">
						<?php
                            // Incluyes tu conexión o usas la conexion del ejemplo
                            include '../conexion.php';
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

							<label for="departamento">Departamento al que pertenece</label>
								<select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="departamento" id="">
									<?php echo $options ?>
								</select>
							</label>
						</div>
						<div class="mb-3">
                            <button class="btn btn-success w-100 ">
                                <h1>Registrar</h1>
                            </button>
                        </div>
					</form>
				<div class="mb-3">
                        <button type="submit" class="btn btn-info w-100" onclick="location.href='../../admin.php'">
                            <h1>Volver</h1>
                        </button>
                    </div>

                </div>
            </div>
        </div>

        <div class="lateral">
            <img src="https://images.unsplash.com/photo-1497032628192-86f99bcd76bc?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="">
        </div>

    </main>

		<script src="assets/js/script.js"></script>
	</body>
</html>