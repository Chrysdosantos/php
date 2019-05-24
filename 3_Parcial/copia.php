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
	</div>

	<?php

	//Incluimos la BD.
	require('conexion.php');

	//Definimos las variables.
	$matriculaConst = '';
	$modalidad = '';
	$generacion = '';
	$opcion = 'reg';

	//Inserción de datos.
	if (isset($_POST['btnRegistrar'])) 
	{
		//Definimos las Variables con su Respectivo Input.
		$matriculaConst = $_POST['tfMatriculaConst'];
		$modalidad = $_POST['tfModalidad'];
		$generacion = $_POST['tfGeneracion'];

		//Operacion Para insertar los Datos.
		$registrar = "INSERT INTO generaciones VALUES ('$matriculaConst','$modalidad','$generacion')";
		$Results = mysqli_query($conexion,$registrar);

		//Limpiamos los Campos de los Inputs.
		$matriculaConst = '';
		$modalidad = '';
		$generacion = '';
	}

	//Actualizar Datos.
	elseif (isset($_POST['btnModificar']))
	{
	 	//Definimos las Variables con su Respectivo Input.
		$matriculaConst = $_POST['tfMatriculaConst'];
		$modalidad = $_POST['tfModalidad'];
		$generacion = $_POST['tfGeneracion'];

		//Operacion Para Modificar los Datos.
		$modificar = "UPDATE generaciones SET MatriculaConst = '$matriculaConst',Modalidad = '$modalidad',Generacion = '$generacion' WHERE MatriculaConst = '$matriculaConst'";
		$Results = mysqli_query($conexion,$modificar);

		//Limpiamos los Campos de los Inputs.
		$matriculaConst = '';
		$modalidad = '';
		$generacion = '';
	}
	  
	//Editar Datos.
	elseif (isset($_POST['btnEditar'])) 
	{
		$matriculaConst = $_POST['btnEditar'];

		$consult = "SELECT * FROM generaciones WHERE MatriculaConst = '$matriculaConst'";
		$res = mysqli_query($conexion,$consult);

		$fila = mysqli_fetch_array($res);
		$modalidad = $fila['Modalidad'];
		$generacion = $fila['Generacion'];

		//Asignamos el Valor a la Variable para que Cambie de Estado.
		$opcion = "edit";
	}

	//Eliminar Datos.
	elseif (isset($_POST['btnEliminar'])) 
	{
		//Creamos la Variable Para Obtener la Matricula.
		$matriculaConst = $_POST['btnEliminar'];

		//Operación para Eliminar Datos.
		$eliminar = "DELETE FROM generaciones WHERE MatriculaConst = '$matriculaConst'";
		$Result = mysqli_query($conexion,$eliminar);

		//Limpiamos los Campos de los Inputs.
		$matriculaConst = '';
		$modalidad = '';
		$generacion = '';
	}
	
	//Mandamos a Traer el Formulario.
	mostrarFormulario($matriculaConst,$modalidad,$generacion,$opcion);

	//Mandamos a Traer los Datos.
	mostrarResultados();

	?>
</body>
</html>

<?php 

	//funcion Para Crear el Formulario.
	function mostrarFormulario($matriculaConst,$modalidad,$generacion,$opcion)
	{
		//Aqui Creamos el Formulario y Sus Campos.
		echo "
		<center>
		<form action='copia.php' method='post' class='wrap'>
			<label>Matricula Constante:</label><input type='text' name='tfMatriculaConst' value='$matriculaConst' placeholder='571819' autofocus>
			<label>Modalidad:</label><input type='text' name='tfModalidad' value='$modalidad' placeholder='Escolarizado'>
			<label>Generación:</label><input type='text' name='tfGeneracion' value='$generacion' placeholder='2016-2018'><br>";

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
		$consulta = 'SELECT * FROM generaciones';
		$resultados = mysqli_query($conexion,$consulta);

		//Aqui Creamos el Formulario.
		echo "
		<form action='copia.php' method='post'>
		<center><br>
		<input type='text' name='' value='' placeholder=''>
		<table border='3' cellpadding='10'><h2>Generaciones</h2>
			<tr>
				<th>Matricula Constante</th>
				<th>Modalidad</th>
				<th>Generacion</th>
				<th>Operaciones</th>
			</tr>";

		//Ciclo Para Mandar a Traer los Datos.
		while ($fila = mysqli_fetch_array($resultados))
		{
			//Definimos las Variables Con el Campo de la BD.
			$matriculaConst = $fila['MatriculaConst'];
			$modalidad = $fila['Modalidad'];
			$generacion = $fila['Generacion'];

			//Aqui se Muestrar los Datos en la Tabla.
			echo "
			<tr>
				<td>$matriculaConst</td>
				<td>$modalidad</td>
				<td>$generacion</td>
				<td>
				  <button name='btnEditar' value='$matriculaConst'>Editar</button>
				  <button name='btnEliminar' value='$matriculaConst'>Eliminar</button>
				</td>
			</tr>";
		}
		echo "</table>
		</center></form>";
	}

?>