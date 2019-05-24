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
	$claveCarrera = '';
	$nombre = '';
	$tipo = '';
	$opcion = 'reg';

	//Inserción de datos.
	if (isset($_POST['btnRegistrar'])) 
	{
		//Definimos las Variables con su Respectivo Input.
		$claveCarrera = $_POST['tfClaveCarrera'];
		$nombre = $_POST['tfNombre'];
		$tipo = $_POST['tfTipo'];

		//Operacion Para insertar los Datos.
		$registrar = "INSERT INTO carreras VALUES ('$claveCarrera','$nombre','$tipo')";
		$Results = mysqli_query($conexion,$registrar);

		//Limpiamos los Campos de los Inputs.
		$claveCarrera = '';
		$nombre = '';
		$tipo = '';
	}

	//Actualizar Datos.
	elseif (isset($_POST['btnModificar']))
	{
	 	//Definimos las Variables con su Respectivo Input.
		$claveCarrera = $_POST['tfClaveCarrera'];
		$nombre = $_POST['tfNombre'];
		$tipo = $_POST['tfTipo'];

		//Operacion Para Modificar los Datos.
		$modificar = "UPDATE carreras SET ClaveCarrera = '$claveCarrera',Nombre = '$nombre',Tipo = '$tipo' WHERE ClaveCarrera = '$claveCarrera'";
		$Results = mysqli_query($conexion,$modificar);

		//Limpiamos los Campos de los Inputs.
		$claveCarrera = '';
		$nombre = '';
		$tipo = '';
	}
	  
	//Editar Datos.
	elseif (isset($_POST['btnEditar'])) 
	{
		$claveCarrera = $_POST['btnEditar'];

		$consult = "SELECT * FROM carreras WHERE ClaveCarrera = '$claveCarrera'";
		$res = mysqli_query($conexion,$consult);

		$fila = mysqli_fetch_array($res);
		$nombre = $fila['Nombre'];
		$tipo = $fila['Tipo'];

		//Asignamos el Valor a la Variable para que Cambie de Estado.
		$opcion = "edit";
	}

	//Eliminar Datos.
	elseif (isset($_POST['btnEliminar'])) 
	{
		//Creamos la Variable Para Obtener la Matricula.
		$claveCarrera = $_POST['btnEliminar'];

		//Operación para Eliminar Datos.
		$eliminar = "DELETE FROM carreras WHERE ClaveCarrera = '$claveCarrera'";
		$Result = mysqli_query($conexion,$eliminar);

		//Limpiamos los Campos de los Inputs.
		$claveCarrera = '';
		$nombre = '';
		$tipo = '';
	}

	//Mandamos a Traer el Formulario.
	mostrarFormulario($claveCarrera,$nombre,$tipo,$opcion);

	//Mandamos a Traer los Datos.
	mostrarResultados();

	?>
</body>
</html>

<?php 

	//funcion Para Crear el Formulario.
	function mostrarFormulario($claveCarrera,$nombre,$tipo,$opcion)
	{
		//Aqui Creamos el Formulario y Sus Campos.
		echo "
		<center>
		<form action='carreras.php' method='post' class='wrap'>
			<label>Clave Carrera:</label><input type='text' name='tfClaveCarrera' value='$claveCarrera' placeholder='TSU-TIC' autofocus>
			<label>Nombre:</label><input type='text' name='tfNombre' value='$nombre' placeholder='Tec. de la Información'>
			<label>Tipo:</label><input type='text' name='tfTipo' value='$tipo' placeholder='TSU'><br>";

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
		$consulta = 'SELECT * FROM carreras';
		$resultados = mysqli_query($conexion,$consulta);

		//Aqui Creamos el Formulario.
		echo "
		<form action='carreras.php' method='post'>
		<center><br>
		<table border='3' cellpadding='10'><h2>Carreras</h2>
			<tr>
				<th>Clave Carrera</th>
				<th>Nombre</th>
				<th>Tipo</th>
				<th>Operaciones</th>
			</tr>";

		//Ciclo Para Mandar a Traer los Datos.
		while ($fila = mysqli_fetch_array($resultados))
		{
			//Definimos las Variables Con el Campo de la BD.
			$claveCarrera = $fila['ClaveCarrera'];
			$nombre = $fila['Nombre'];
			$tipo = $fila['Tipo'];

			//Aqui se Muestrar los Datos en la Tabla.
			echo "
			<tr>
				<td>$claveCarrera</td>
				<td>$nombre</td>
				<td>$tipo</td>
				<td>
				  <button name='btnEditar' value='$claveCarrera'>Editar</button>
				  <button name='btnEliminar' value='$claveCarrera'>Eliminar</button>
				</td>
			</tr>";
		}
		echo "</table>
		</center></form>";
	}

?>