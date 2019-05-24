<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>3 - Parcial - ING - TI</title>
	<link rel="stylesheet" href="estilo.css">
	<link rel="stylesheet" href="estilos_principal.css">
</head>
<body>

	<div id="contenedor">
    <div id="encabezado">
	<header>
		<h1>Control de Alumnos UT</h1>
	</header>
	<nav>
		<ul class="nav"> 
			<li><a href="generaciones.php">Generaciones</a></li>
			<li><a href="periodos.php">Periodos</a></li>
			<li><a href="carreras.php">Carreras</a></li>
			<li><a href="grupos.php">Grupos</a></li>
			<li><a href="inscripciones.php">Inscripciones</a></li>
			<li><a href="materias.php">Materias</a></li>
			<li><a href="profesores.php">Profesores</a></li>
			<li><a href="imparte.php">Imparte</a></li>
			<li><a href="#">Calificaciones</a></li>
            <li><a href="index.php">Inicio</a></li>
		</ul>
	</nav>
	</div>

	<?php

	//Incluimos la BD.
	require('conexion.php');

	//Definimos las variables.
	$clavePeriodo = '';
	$nombre = '';
	$opcion = 'reg';

	//Inserción de datos.
	if (isset($_POST['btnRegistrar'])) 
	{
		//Definimos las Variables con su Respectivo Input.
		$clavePeriodo = $_POST['tfClavePeriodo'];
		$nombre = $_POST['tfNombre'];

		//Operacion Para insertar los Datos.
		$registrar = "INSERT INTO periodos VALUES ('$clavePeriodo','$nombre')";
		$Results = mysqli_query($conexion,$registrar);

		//Limpiamos los Campos de los Inputs.
		$clavePeriodo = '';
		$nombre = '';
	}

	//Actualizar Datos.
	elseif (isset($_POST['btnModificar']))
	{
	 	//Definimos las Variables con su Respectivo Input.
		$clavePeriodo = $_POST['tfClavePeriodo'];
		$nombre = $_POST['tfNombre'];

		//Operacion Para Modificar los Datos.
		$modificar = "UPDATE periodos SET ClavePeriodo = '$clavePeriodo',Nombre = '$nombre' WHERE ClavePeriodo = '$clavePeriodo'";
		$Results = mysqli_query($conexion,$modificar);

		//Limpiamos los Campos de los Inputs.
		$clavePeriodo = '';
		$nombre = '';
	}
	  
	//Editar Datos.
	elseif (isset($_POST['btnEditar'])) 
	{
		$clavePeriodo = $_POST['btnEditar'];

		$consult = "SELECT * FROM periodos WHERE ClavePeriodo = '$clavePeriodo'";
		$res = mysqli_query($conexion,$consult);

		$fila = mysqli_fetch_array($res);
		$nombre = $fila['Nombre'];

		//Asignamos el Valor a la Variable para que Cambie de Estado.
		$opcion = "edit";
	}

	//Eliminar Datos.
	elseif (isset($_POST['btnEliminar'])) 
	{
		//Creamos la Variable Para Obtener la Matricula.
		$clavePeriodo = $_POST['btnEliminar'];

		//Operación para Eliminar Datos.
		$eliminar = "DELETE FROM periodos WHERE ClavePeriodo = '$clavePeriodo'";
		$Result = mysqli_query($conexion,$eliminar);

		//Limpiamos los Campos de los Inputs.
		$clavePeriodo = '';
		$nombre = '';
	}

	//Mandamos a Traer el Formulario.
	mostrarFormulario($clavePeriodo,$nombre,$opcion);

	//Mandamos a Traer los Datos.
	mostrarResultados();

	?>
</body>
</html>

<?php 

	//funcion Para Crear el Formulario.
	function mostrarFormulario($clavePeriodo,$nombre,$opcion)
	{
		//Aqui Creamos el Formulario y Sus Campos.
		echo "
		<center>
		<form action='periodos.php' method='post' class='wrap'>
			<label>Clave Periodo:</label><input type='text' name='tfClavePeriodo' value='$clavePeriodo' placeholder='EA17' autofocus>
			<label>Nombre:</label><input type='text' name='tfNombre' value='$nombre' placeholder='Enero-Abril'><br>";

			if($opcion == "edit")
				echo "<input type='submit' name='btnModificar' value='Modificar'/>";
			elseif($opcion == "reg")
				echo "<input type='submit' name='btnRegistrar' value='Registrar'/>";


		echo "<label></label><input type='reset' name='btnCancelar' value='Cancelar'/>
		</form>
		</center>";
	}

	//Función Para Mostrar los Datos.
	function mostrarResultados()
	{
		//Incluimos la Conexión.
		require('conexion.php');

		//Realizamos la Consulta de los Datos.
		$consulta = 'SELECT * FROM periodos';
		$resultados = mysqli_query($conexion,$consulta);

		//Aqui Creamos el Formulario.
		echo "
		<form action='periodos.php' method='post'>
		<center><br>
		<table border='3' cellpadding='10'><h2>Periodos</h2>
			<tr>
				<th>Clave Periodo</th>
				<th>Nombre</th>
				<th>Operaciones</th>
			</tr>";

		//Ciclo Para Mandar a Traer los Datos.
		while ($fila = mysqli_fetch_array($resultados))
		{
			//Definimos las Variables Con el Campo de la BD.
			$clavePeriodo = $fila['ClavePeriodo'];
			$nombre = $fila['Nombre'];

			//Aqui se Muestrar los Datos en la Tabla.
			echo "
			<tr>
				<td>$clavePeriodo</td>
				<td>$nombre</td>
				<td>
				  <button name='btnEditar' value='$clavePeriodo'>Editar</button>
				  <button name='btnEliminar' value='$clavePeriodo'>Eliminar</button>
				</td>
			</tr>";
		}
		echo "</table>
		</center></form>";
	}

?>