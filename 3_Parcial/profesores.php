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
	$idProf = '';
	$nombre = '';
	$paterno = '';
	$materno = '';
	$opcion = 'reg';

	//Inserción de datos.
	if (isset($_POST['btnRegistrar'])) 
	{
		//Definimos las Variables con su Respectivo Input.
		$idProf = $_POST['tfIdProf'];
		$nombre = $_POST['tfNombre'];
		$paterno = $_POST['tfPaterno'];
		$materno = $_POST['tfMaterno'];

		//Operacion Para insertar los Datos.
		$registrar = "INSERT INTO profesores VALUES ('$idProf','$nombre','$paterno','$materno')";
		$Results = mysqli_query($conexion,$registrar);

		//Limpiamos los Campos de los Inputs.
		$idProf = '';
		$nombre = '';
		$paterno = '';
		$materno = '';
	}

	//Actualizar Datos.
	elseif (isset($_POST['btnModificar']))
	{
	 	//Definimos las Variables con su Respectivo Input.
		$idProf = $_POST['tfIdProf'];
		$nombre = $_POST['tfNombre'];
		$paterno = $_POST['tfPaterno'];
		$materno = $_POST['tfMaterno'];

		//Operacion Para Modificar los Datos.
		$modificar = "UPDATE profesores SET IdProf = '$idProf',Nombre = '$nombre',Paterno = '$paterno',Materno = '$materno' WHERE IdProf = '$idProf'";
		$Results = mysqli_query($conexion,$modificar);

		//Limpiamos los Campos de los Inputs.
		$idProf = '';
		$nombre = '';
		$paterno = '';
		$materno = '';
	}
	  
	//Editar Datos.
	elseif (isset($_POST['btnEditar'])) 
	{
		$idProf = $_POST['btnEditar'];

		$consult = "SELECT * FROM profesores WHERE IdProf = '$idProf'";
		$res = mysqli_query($conexion,$consult);

		$fila = mysqli_fetch_array($res);
		$nombre = $fila['Nombre'];
		$paterno = $fila['Paterno'];
		$materno = $fila['Materno'];

		//Asignamos el Valor a la Variable para que Cambie de Estado.
		$opcion = "edit";
	}

	//Eliminar Datos.
	elseif (isset($_POST['btnEliminar'])) 
	{
		//Creamos la Variable Para Obtener la Matricula.
		$idProf = $_POST['btnEliminar'];

		//Operación para Eliminar Datos.
		$eliminar = "DELETE FROM profesores WHERE IdProf = '$idProf'";
		$Result = mysqli_query($conexion,$eliminar);

		//Limpiamos los Campos de los Inputs.
		$idProf = '';
		$nombre = '';
		$paterno = '';
		$materno = '';
	}

	//Mandamos a Traer el Formulario.
	mostrarFormulario($idProf,$nombre,$paterno,$materno,$opcion);

	//Mandamos a Traer los Datos.
	mostrarResultados();

	?>
</body>
</html>

<?php 

	//funcion Para Crear el Formulario.
	function mostrarFormulario($idProf,$nombre,$paterno,$materno,$opcion)
	{
		//Aqui Creamos el Formulario y Sus Campos.
		echo "
		<center>
		<form action='profesores.php' method='post' class='wrap'>
			<label>Id Profesor:</label><input type='text' name='tfIdProf' value='$idProf' placeholder='1' autofocus>
			<label>Nombre:</label><input type='text' name='tfNombre' value='$nombre' placeholder='Andrea'>
			<label>Paterno:</label><input type='text' name='tfPaterno' value='$paterno' placeholder='Robles'><br>
			<label>Materno:</label><input type='text' name='tfMaterno' value='$materno' placeholder='Salgado'><br>";

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
		$consulta = 'SELECT * FROM profesores';
		$resultados = mysqli_query($conexion,$consulta);

		//Aqui Creamos el Formulario.
		echo "
		<form action='profesores.php' method='post'>
		<center><br>
		<table border='3' cellpadding='10'><h2>Profesores</h2>
			<tr>
				<th>Id Profesor</th>
				<th>Nombre</th>
				<th>Paterno</th>
				<th>Materno</th>
				<th>Operaciones</th>
			</tr>";

		//Ciclo Para Mandar a Traer los Datos.
		while ($fila = mysqli_fetch_array($resultados))
		{
			//Definimos las Variables Con el Campo de la BD.
			$idProf = $fila['IdProf'];
			$nombre = $fila['Nombre'];
			$paterno = $fila['Paterno'];
			$materno = $fila['Materno'];

			//Aqui se Muestrar los Datos en la Tabla.
			echo "
			<tr>
				<td>$idProf</td>
				<td>$nombre</td>
				<td>$paterno</td>
				<td>$materno</td>
				<td>
				  <button name='btnEditar' value='$idProf'>Editar</button>
				  <button name='btnEliminar' value='$idProf'>Eliminar</button>
				</td>
			</tr>";
		}
		echo "</table>
		</center></form>";
	}

?>